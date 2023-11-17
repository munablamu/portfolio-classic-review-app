<x-layout title='Classic Music Review App'>
  <h1>Home Following Users</h1>

  <h2>{{ $user->name }}</h2>
  <!-- TODO 画像が存在しない倍の処理 -->
  <img src="{{ asset('storage/user_icons/' . $user->icon_filename) }}" alt="" width="100">
  <p>レビュー件数: {{ $reviewCount }}件 (評価件数: {{ $allReviewCount }}件)</p>
  <p>レビューについたいいね総数: {{ $likeSum }}</p>

  <div>
    <a href="{{ route('home') }}">フォロー中のユーザーの新着レビュー</a>
    <a href="{{ route('home.following_users') }}">フォローユーザー管理</a>
    <a href="{{ route('home.reviews') }}">レビュー管理</a>
    <a href="{{ route('home.edit_profile') }}">プロフィール管理</a>
  </div>

  <div>
    @if ( $following_users->count() === 0 )
      <p>ユーザーをフォローすると、ここにフォローユーザーが表示されます。</p>
    @else
      <details>
        @foreach ( $following_users as $i_user )
          <summary><a href="{{ route('user.show', ['id' => $i_user->id]) }}">{{ $i_user->name }}</a></summary>
          <div>
          </div>
        @endforeach
      </details>
    @endif
  </div>
</x-layout>
