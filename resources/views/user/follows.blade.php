<x-layout :title="$user->name">
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromUserController=$fromUserController />

  <x-user.nav_tabs :user=$user />

  <div class="mx-5 mt-4">
    @if ( $follows->count() === 0 )
      <p class="text-slate-400 dark:text-slate-400">このユーザーは誰もフォローしていません。</p>
    @else
      <ul class="-mt-4 mb-4">
        @foreach ( $follows as $i_user )
          <li>
            <x-user.card :user=$i_user />
          </li>
        @endforeach
      </ul>
      {{ $follows->appends(request()->query())->links('vendor.pagination.original') }}
    @endif
  </div>
</x-layout>

<x-common.help message="このユーザーがフォローしているユーザーの一覧です。" />
