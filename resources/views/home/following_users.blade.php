<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromHomeController=$fromHomeController />

  <x-home.nav_tabs />

  <div class="mx-5 mt-4">
    @if ( $following_users->count() === 0 )
      <p class="text-slate-400 dark:text-slate-400">ユーザーをフォローすると、ここにフォローユーザーが表示されます。</p>
    @else
      <ul class="-mt-4">
        @foreach ( $following_users as $i_user )
          <li>
            <x-user.card :user=$i_user />
          </li>
        @endforeach
      </ul>
      {{ $following_users->appends(request()->query())->links() }}
    @endif
  </div>
</x-layout>
