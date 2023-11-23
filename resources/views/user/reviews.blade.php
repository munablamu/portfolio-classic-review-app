<x-layout title='Classic Music Review App'>
  <h1>User Reviews</h1>

  <h2>{{ $user->name }}</h2>
  <img src="{{ user_icon_url($user->icon_filename) }}" alt="" width="100">
  <p>レビュー件数: {{ $reviewCount }}件 (評価件数: {{ $allReviewCount }}件)</p>
  <p>レビューについたいいね総数: {{ $likeSum }}</p>

  <div>
    <h3>レビュー</h3>
    @foreach ( $reviews as $i_review )
      <details>
        <summary>{{ $i_review->recording->title }}, {{ $i_review->rate }}, {{ $i_review->like }}</summary>
        <div>
          <p>{{ $i_review->title }}</p>
          <a href="{{ route('recording.show', ['recording' => $i_review->recording]) }}">レビューを見る</a>
        </div>
      </details>
    @endforeach
    {{ $reviews->links() }}
  </div>
</x-layout>

