<x-layout title='Classic Music Review App'>
  <h1>User Detail</h1>

  <h2>{{ $user->name }}</h2>
  <!-- TODO 画像が存在しない倍の処理 -->
  <img src="{{ asset('storage/user_icons/' . $user->icon_filename) }}" alt="" width="100">
  <p>レビュー件数: {{ $reviewCount }}件 (評価件数: {{ $allReviewCount }}件)</p>
  <p>レビューについたいいね総数: {{ $likeSum }}</p>
  <a href="{{ route('user.reviews', ['id' => $user->id ]) }}">{{ $user->name }}さんのレビューを見る</a>

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

</x-layout>

