<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <x-home.nav_tabs />

  <div>
    @if ( $following_users->count() === 0 )
      <p>ユーザーをフォローすると、ここにフォローユーザーが表示されます。</p>
    @else
      @foreach ( $following_users as $i_user )
        <details>
          <summary>{{ $i_user->name }}</summary>
          <div>
            <a href="{{ route('user.show', ['user' => $i_user]) }}">ユーザーのページを見る</a>
          </div>
        </details>
      @endforeach
      {{ $following_users->links() }}
    @endif
  </div>
</x-layout>
