<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromUserController=$fromUserController />

  <x-user.nav_tabs :user=$user />

  <div class="flex justify-end mx-5">
    @php
      $orderBy = request()->query('orderBy', 'like');
    @endphp
    <div class="my-4 text-right">
      <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 dark:border-sky-300 {{ $orderBy === 'like' ? ' bg-slate-500 text-slate-50 dark:bg-sky-300 dark:text-slate-700' : 'bg-inherit text-slate-500 dark:bg-inherit dark:text-sky-300' }}"
        href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'like']) }}">
        <i class="fa-solid fa-heart mr-1"></i>いいね順
      </a>
      <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 dark:border-sky-300 {{ $orderBy === 'rate' ? ' bg-slate-500 text-slate-50 dark:bg-sky-300 dark:text-slate-700' : 'bg-inherit text-slate-500 dark:bg-inherit dark:text-sky-300' }}"
        href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'rate']) }}">
        <i class="fa-solid fa-star mr-1"></i>高評価順
      </a>
      <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 dark:border-sky-300 {{ $orderBy === 'updated_at' ? ' bg-slate-500 text-slate-50 dark:bg-sky-300 dark:text-slate-700' : 'bg-inherit text-slate-500 dark:bg-inherit dark:text-sky-300' }}"
        href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'updated_at']) }}">
        <i class="fa-solid fa-calendar-plus mr-1"></i>新着投稿順
      </a>
    </div>
  </div>

  <div class="mx-5">
    @if ( $reviews->count() === 0 )
      <p class="text-slate-400 dark:text-slate-400">このユーザーはまだレビューを投稿していません。</p>
    @else
      <ul>
        @foreach ( $reviews as $i_review )
          <li>
            <x-review.card_in_user_review :review=$i_review />
          </li>
        @endforeach
      </ul>
    @endif
  </div>
  {{ $reviews->appends(request()->query())->links() }}
</x-layout>

