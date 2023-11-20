<x-layout title='Classic Music Review App'>
  <h1>Home Reviews</h1>

  <h2>{{ $user->name }}</h2>
  <img src="{{ user_icon_url($user->icon_filename) }}" alt="" width="100">
  <p>レビュー件数: {{ $reviewCount }}件 (評価件数: {{ $allReviewCount }}件)</p>
  <p>レビューについたいいね総数: {{ $likeSum }}</p>

  <div>
    <a href="{{ route('home') }}">フォロー中のユーザーの新着レビュー</a>
    <a href="{{ route('home.following_users') }}">フォローユーザー管理</a>
    <a href="{{ route('home.reviews') }}">レビュー管理</a>
    <a href="{{ route('home.edit_profile') }}">プロフィール管理</a>
  </div>

  <div>
    @if ( $reviews->count() === 0 )
      <p>レビューを投稿すると、ここにレビュー一覧が表示されます</p>
    @else
      @foreach ( $reviews as $i_review )
        <details>
          <summary>{{ $i_review->recording->title }}</summary>
          <div>
            <p>{{ $i_review->rate }}</p>
            <form action="{{ route('review.delete', ['review' => $i_review]) }}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit">削除</button>
            </form>
          </div>
        </details>
      @endforeach
    @endif
  </div>
</x-layout>

