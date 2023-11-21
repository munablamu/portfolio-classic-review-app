<x-layout title='Classic Music Review App'>
  <h1>Home Index</h1>

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
    @if ( $following_user_reviews->count() === 0 )
      <p>ユーザーをフォローすると、ここに新着レビューが表示されます。</p>
    @else
      @foreach ( $following_user_reviews as $i_review )
        <details>
          <summary>{{ $i_review->title }}, {{ $i_review->updated_at }}, {{ $i_review->user->name }}</summary>
          <div>
            {{ $i_review->recording_id }}
          </div>
        </details>
      @endforeach
    @endif
    {{ $following_user_reviews->links() }}
  </div>
</x-layout>
