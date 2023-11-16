<x-layout title='Classic Music Review App'>
  <h1>User Detail</h1>

  <h2>{{ $user->name }}</h2>
  <p>レビュー件数: {{ $reviewCount }}件 (評価件数: {{ $allReviewCount }}件)</p>
  <p>レビューについたいいね総数: {{ $likeSum }}</p>

  <div>
    <h3>自己紹介</h3>
    <p>{{ $user->self_introduction }}</p>
  </div>

  <div>
    <h3>お気に入りの録音</h2>
    @foreach ( $user->favoriteRecordings as $i_recording )
      <details>
        <summary>{{ $i_recording->title }}</summary>
        <dev>
          <p>{{ $i_recording->artist_names_joined_by_comma }}</p>
          <a href="{{ route('recording.show', ['id' => $i_recording->id]) }}">詳細を見る</a>
        </div>
      </details>
    @endforeach
  </div>

  <div>
    <h3>お気に入りの演奏家</h2>
    @foreach ( $user->favoriteArtists as $i_artist )
        <a href="{{ route('artist.show', ['id' => $i_artist->id]) }}">{{ $i_artist->name }}</a>
        <br />
    @endforeach
  </div>

  <div>
    <h3>レビュー</h3>
    @foreach ( $reviews as $i_review )
      <details>
        <summary>{{ $i_review->recording->title }}, {{ $i_review->rate }}, {{ $i_review->like }}</summary>
        <div>
          <p>{{ $i_review->title }}</p>
          <a href="{{ route('recording.show', ['id' => $i_review->recording->id]) }}">レビューを見る</a>
        </div>
      </details>
    @endforeach
  </div>
  {{ $reviews->links() }}
</x-layout>

