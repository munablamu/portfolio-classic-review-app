# ルートディレクトリから実行してください。
import sys
import re
import math
import traceback
from typing import Callable, Tuple, Any
import json
import requests
from urllib.parse import urljoin
import argparse
from argparse import Namespace

import pandas as pd

from scraper import Scraper, Item

DOWNLOAD_DELAY = 3
BASE_URL = 'https://www.prestomusic.com/classical/search'
COMPOSERS_PATH = 'database/seeders/composers.json'
MUSICS_PATH = 'database/seeders/musics.json'
OUTPUT_JL_PATH = 'database/seeders/recordings.jl'
RECORDINGS_PATH = 'database/seeders/recordings.json'
ARTISTS_JSON = 'database/seeders/artists.json'
OUTPUT_COLUMNS = ['keyword', 'music_id', 'title', 'artists', 'release_date', 'catalogue_no', 'jacket_filename', 'url']
HTML_PARSER = 'lxml'
MAX_SEARCH_NUMBER = 20
ITEM_NUM_IN_PAGE = 20


def main():
    args = get_args()

    search_criteria_list = read_json(COMPOSERS_PATH, MUSICS_PATH)

    scraped_keywords = set()
    if args.restart:
        scraped_keywords = read_jl(OUTPUT_JL_PATH)

    with Scraper(BASE_URL, HTML_PARSER, DOWNLOAD_DELAY) as scraper:
        for search_criteria in search_criteria_list.itertuples():
            keyword = search_criteria.keyword

            if keyword in scraped_keywords:
                print(f'INFO: Skip scraped keyword "{keyword}"')
                continue

            first_list_page_url = get_first_list_page_url(scraper, keyword)
            detail_urls = fetch_detail_urls(scraper, first_list_page_url)
            item_infos = fetch_item_infos(scraper, detail_urls)
            modify_item_infos(item_infos, search_criteria)
            overwrite_jl(OUTPUT_JL_PATH, item_infos)

    write_json(RECORDINGS_PATH, ARTISTS_JSON, OUTPUT_JL_PATH)


def get_args() -> Namespace:
    """
    コマンドライン引数の名前空間を返す。

    Returns:
        Namespace: _description_
    """
    parser = argparse.ArgumentParser()
    parser.add_argument('--restart', action='store_true')
    return parser.parse_args()


def read_json(composers_path: str, musics_path: str) -> pd.core.frame.DataFrame:
    df_composers = pd.read_json(composers_path)
    df_musics = pd.read_json(musics_path)

    df_merged = pd.merge(df_musics, df_composers, left_on='composer_id', right_on='id')
    df_merged.rename(columns={'name': 'composer'}, inplace=True)
    df_merged.drop('id', axis=1)
    df_merged['id'] = range(1, len(df_merged)+1)

    df_merged['keyword'] = df_merged['composer'] + ' ' + df_merged['title'] + ' ' + df_merged['opus'].fillna('')

    print('Finished to read input excel file.')
    return df_merged


def read_jl(jl_path: str) -> set:
    """
    'results.jl'を読み込んで、スクレイピング済みの検索キーワードを返す。

    Args:
        jl_path (str): _description_

    Returns:
        set: _description_
    """
    existed_keywords = set()
    with open(jl_path, 'r') as file:
        for line in file:
            obj = json.loads(line)
            existed_keywords.add(obj['keyword'])
    return existed_keywords


def get_first_list_page_url(scraper: Scraper, keyword: str ,
                            item_num_in_page: int=ITEM_NUM_IN_PAGE) -> bool:
    """
    一覧ページの1ページ目のURLを取得する。

    Args:
        session (Session): _description_
        criteria (dict): _description_

    Returns:
        str: _description_
    """
    base_url = scraper.base_url
    return base_url + '?search_query=' + keyword + '&size=' + str(item_num_in_page) + '&page=1&view=large&sort=relevance'


def fetch_detail_urls(scraper: Scraper, first_list_page_url: str,
                      max_search_number: int=MAX_SEARCH_NUMBER,
                      item_num_in_page: int=ITEM_NUM_IN_PAGE) -> list:
    """
    一覧ページから詳細ページを取得する。
    ただし、取得に失敗した場合、複数回試行を繰り返す。

    Args:
        scraper (Scraper): _description_
        first_list_page_url (str): _description_
        item_num_in_page (int, optional): _description_. Defaults to ITEM_NUM_IN_PAGE.

    Returns:
        list: _description_
    """
    try:
        urls = try_func(scrape_detail_urls, kwargs={'scraper': scraper,
                                                    'first_list_page_url': first_list_page_url,
                                                    'max_search_number': max_search_number,
                                                    'item_num_in_page': item_num_in_page})
    except Exception as e:
        handle_scraping_error(e, scraper)

    return urls


def scrape_detail_urls(scraper: Scraper, first_list_page_url: str,
                      max_search_number: int=MAX_SEARCH_NUMBER,
                      item_num_in_page: int=ITEM_NUM_IN_PAGE) -> list[str]:
    """
    一覧ページから詳細ページのURLを取得する。

    Args:
        scraper (Scraper): _description_
        first_list_page_url (str): _description_
        item_num_in_page (int, optional): _description_. Defaults to ITEM_NUM_IN_PAGE.

    Returns:
        list[str]: _description_
    """
    scraper.get(first_list_page_url,
                success_message=f'First list page "{first_list_page_url}" access succeeded.')
    heading = scraper.select_one('#a11y-toolbar > div.c-browse__toolbar-count').text
    total_item_num_re = re.search(r'(\d+) results', heading)

    urls = []
    if total_item_num_re is not None:
        total_item_num = int(total_item_num_re[1])
        total_page_num = math.ceil(total_item_num / item_num_in_page)
        print('Number of detail pages: ' + str(total_item_num))

        # undisplayed_item_num = total_item_num
        for page_num in range(1, total_page_num+1):
            # 表示件数が少ないとき、「一部の語句に一致する検索結果」が表示されてしまうので、
            # 「一部の語句に一致する検索結果」のaタグをa_elementsに含めないようにする対策。
            # if undisplayed_item_num > item_num_in_page:
            #     item_num_in_current_page = item_num_in_page
            #     undisplayed_item_num -= item_num_in_page
            # else:
            #     item_num_in_current_page = undisplayed_item_num
            #     undisplayed_item_num = 0

            search_list_element = scraper.select_one('#a11y-results')
            item_elements = search_list_element.select('.c-product-block')
            a_elements = [i.select_one('h2 > a') for i in item_elements]
            a_elements = a_elements[:min(total_item_num, max_search_number)] # 「一部の語句に一致する検索結果」を除外
            base_url = 'https://www.prestomusic.com'
            urls.extend([urljoin(base_url, i.get('href').split('?')[0]) for i in a_elements])

            break # 今回は「1ページに表示されるアイテム数　> 検索したいアイテム数」なので

            if page_num < total_page_num:
                get_next_page(scraper, first_list_page_url, page_num+1)

    return urls


def get_next_page(scraper: Scraper, first_url: str, page_num: int):
    """
    次のページの一覧ページを取得する。

    Args:
        scraper (Scraper): _description_
        first_url (str): _description_
        page_num (int): _description_

    Returns:
        bool: _description_
    """
    param_key = '_pgn'
    next_url = first_url + f'&{param_key}={page_num}'
    scraper.get(next_url, success_message=f'Next list page "{next_url}" access succeeded.')


def fetch_item_infos(scraper: Scraper, detail_urls: list) -> Item:
    """
    すべての詳細ページから情報を取得する。
    ただし、取得に失敗した場合、複数回試行を繰り返す。

    Args:
        scraper (Scraper): _description_
        detail_urls (list): _description_

    Returns:
        Item: _description_
    """
    len_detail_urls = len(detail_urls)

    item_infos = Item(OUTPUT_COLUMNS)
    for i, i_url in enumerate(detail_urls, start=1):
        try:
            item_info = try_func(scrape_item_info, kwargs={'scraper': scraper, 'url': i_url})
        except Exception as e:
            handle_scraping_error(e, scraper)

        item_info['url'] = scraper.url # リダイレクトされている場合もあるのでi_urlではなく、scraper.url

        item_infos.add_row(item_info)
        print(f'Item {i}/{len_detail_urls}:', item_info)

    return item_infos


def scrape_item_info(scraper: Scraper, url: str) -> dict:
    """
    1つの詳細ページから情報を取得する。

    Args:
        scraper (Scraper): _description_
        url (str): _description_

    Returns:
        dict: _description_
    """
    scraper.get(url)

    info = {}
    title_element = scraper.select_one('h1')
    for span in title_element('span'):
        span.decompose()
    info['title'] = title_element.text.strip()

    artists_tag = scraper.select_one('.c-product-block__contributors')
    if artists_tag is not None:
        artists_text = ', '.join(p.get_text() for p in artists_tag.find_all('p'))
        artists_text = artists_text.replace('&', ',')
        artists_text = artists_text.replace('...', '')
        artists_text = re.sub(r'\([^)]*\)', '', artists_text) # (piano)などの文字を削除
        artists = artists_text.split(',')
        info['artists'] = [i_artist.strip() for i_artist in artists]

    metadata_ul = scraper.select_one('.c-product-block__metadata > ul')
    for li in metadata_ul.find_all('li'):
        if 'Release Date:' in li.text:
            info['release_date'] = li.text.split(':')[1].strip()
        elif 'Catalogue No:' in li.text:
            info['catalogue_no'] = li.text.split(':')[1].strip()

    jacket_url = None
    jacket_a = scraper.select_one('.c-product-block__aside  a.o-image')
    if jacket_a is not None:
        jacket_url = jacket_a['href']
    else:
        jacket_img = scraper.select_one('.c-product-block__aside .o-image img')
        if jacket_img is not None:
            jacket_url = jacket_img.get('src')

    if (jacket_url is not None) and jacket_url.startswith('https'):
        jacket_response = requests.get(jacket_url, stream=True)
        info['jacket_filename'] = jacket_url.split('/')[-1]

        with open('database/seeders/jackets/' + info['jacket_filename'], 'wb') as f:
            f.write(jacket_response.content)

    return info


def modify_item_infos(item_infos: Item, search_criteria):
    """
    Itemにメーカー名、製品型番、検索キーワードを追加する。

    Args:
        item_infos (Item): _description_
        search_criteria (dict): _description_
    """
    item_infos['keyword'] = search_criteria.keyword
    item_infos['music_id'] = search_criteria.id
    item_infos.to_datetime(key='release_date', format='%dth %b %Y')


def overwrite_jl(jl_path: str, item_infos: Item):
    """
    Itemをjsonlineファイルに追記する。

    Args:
        jl_path (str): _description_
        item_infos (Item): _description_
    """
    if item_infos.empty:
        return

    with open(jl_path, 'a') as f:
        f.write(item_infos.to_json(orient='records', force_ascii=False, lines=True))


def write_json(recordings_path: str, artists_path: str, jl_path: str):
    """
    jsonlineファイルをexcelファイルに変換する。

    Args:
        excel_path (str): _description_
        jl_path (str): _description_
    """
    item_infos = pd.read_json(jl_path, orient='records', lines=True)

    artists = []

    id = 1
    for i, row in item_infos.iterrows():
        if row['artists'] is not None:
            for i_artist in row['artists']:
                if i_artist not in artists:
                    artists.append({"id": id, "name": i_artist})
                    id += 1

    with open(artists_path, 'w') as f:
        json.dump(artists, f, ensure_ascii=False, indent=4)

    item_infos['artist_ids'] = [[] for _ in range(len(item_infos))]

    for i, row in item_infos.iterrows():
        if row['artists'] is not None:
            artists_id = []
            for i_artist in row['artists']:
                for j_artist in artists:
                    if i_artist == j_artist['name']:
                        artists_id.append(j_artist['id'])
            item_infos.at[i, 'artist_ids'] = artists_id

    item_infos = item_infos.drop(columns=['keyword', 'artists', 'url'])
    item_infos.rename(columns={'id': 'music_id'}, inplace=True) # TODO 横着したので、最初からやり直す場合は消す

    with open(recordings_path, 'w') as f:
        f.write(item_infos.to_json(orient='records', force_ascii=False, indent=4))


    # item_infos.to_json(json_path, orient='records', lines=True)

    print('Finished to write output excel file.')


def try_func(func: Callable, args: Tuple=(), kwargs: dict={}, max_retry: int=3) -> Any:
    """
    funcが成功するまで、複数回試行する。

    Args:
        func (Callable): _description_
        args (Tuple, optional): _description_. Defaults to ().
        kwargs (dict, optional): _description_. Defaults to {}.
        max_retry (int, optional): _description_. Defaults to 3.

    Raises:
        e: _description_

    Returns:
        Any: _description_
    """
    for i in range(max_retry):
        try:
            return func(*args, **kwargs)
        except Exception as e:
            print(e)
            if i == max_retry - 1:
                raise e
            print(f'INFO: {func.__name__} failed. Try again.')


def handle_scraping_error(e: Exception, scraper: Scraper):
    """
    スクレイピング時のエラーを処理する。

    Args:
        e (Exception): _description_
        scraper (Scraper): _description_
    """
    with open('scraping_error.html', 'w') as f:
        f.write(scraper.text)
    traceback.print_exc()
    print(f'scraping error in URL "{scraper.url}"')
    sys.exit(1)


if __name__ == '__main__':
    main()
