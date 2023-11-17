<x-layout title='Classic Music Review App'>
  <h1>User Reviews</h1>

  <h2>{{ $user->name }}</h2>
  <!-- TODO 画像が存在しない倍の処理 -->
  <img src="{{ asset('storage/user_icons/' . $user->icon_filename) }}" alt="" width="100">
  <p>レビュー件数: {{ $reviewCount }}件 (評価件数: {{ $allReviewCount }}件)</p>
  <p>レビューについたいいね総数: {{ $likeSum }}</p>

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

