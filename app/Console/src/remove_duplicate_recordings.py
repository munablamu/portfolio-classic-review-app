import pandas as pd

RECORDINGS_PATH = 'database/seeders/recordings.json'

def main():
    df = pd.read_json(RECORDINGS_PATH)
    df['artist_ids'] = df['artist_ids'].apply(tuple)
    df = df.drop_duplicates(subset=['artist_ids', 'title'])
    df['artist_ids'] = df['artist_ids'].apply(list)

    with open(RECORDINGS_PATH, 'w') as f:
        f.write(df.to_json(orient='records', force_ascii=False, indent=4))

if __name__ == '__main__':
    main()

