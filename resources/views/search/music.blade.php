<x-layout title='Classic Music Review App'>
  <h1 class="search_h">Search by Music Title</h1>

  <div class="mx-3">
    <x-search.bar :q='$q' :oldSearchType=$oldSearchType />
  </div>
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">実際には英語に翻訳された「＊＊＊＊＊＊＊＊＊」で検索されています。</p>
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">検索結果: ****件</p>

  <div class="mx-5 mt-2">
    @if ( $musics->count() === 0 )
      <p>検索したキーワードでは1件もヒットしませんでした。</p>
    @else
      <ul>
        @foreach ( $musics as $i_music )
        <li>
          <x-music.card :music=$i_music />
        </li>
        @endforeach
      </ul>

      <div>
        {{ $musics->links() }}
      </div>
    @endif
  </div>
</x-layout>
