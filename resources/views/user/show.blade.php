<x-layout title='Classic Music Review App'>
  <h1>User Detail</h1>

  <h2>{{ $user->name }}</h2>
  <img src="{{ user_icon_url($user->icon_filename) }}" alt="" width="100">
  <p>レビュー件数: {{ $reviewCount }}件 (評価件数: {{ $allReviewCount }}件)</p>
  <p>レビューについたいいね総数: {{ $likeSum }}</p>
  <a href="{{ route('user.reviews', ['user' => $user ]) }}">{{ $user->name }}さんのレビューを見る</a>

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
          <a href="{{ route('recording.show', ['recording' => $i_recording]) }}">詳細を見る</a>
        </div>
      </details>
    @endforeach
  </div>

  <div>
    <h3>お気に入りの演奏家</h2>
    @foreach ( $user->favoriteArtists as $i_artist )
        <a href="{{ route('artist.show', ['artist' => $i_artist]) }}">{{ $i_artist->name }}</a>
        <br />
    @endforeach
  </div>

</x-layout>

