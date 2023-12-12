<x-layout :title="$user->name">
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromUserController=$fromUserController />

  <x-user.nav_tabs :user=$user />

  @if ( $user->self_introduction === null )
    <p class="text-slate-400 dark:text-slate-400 mx-5">このユーザーはまだレビューを投稿していません。</p>
  @else
    <div class="flex justify-end mx-5">
      @php
        $orderBy = request()->query('orderBy', 'like');
      @endphp
      <div class="my-4 text-right">
        <a class="order {{ $orderBy === 'like' ? 'order-true' : 'order-false' }}"
          href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'like']) }}">
          <i class="fa-solid fa-heart mr-1"></i>いいね順
        </a>
        <a class="order {{ $orderBy === 'rate' ? 'order-true' : 'order-false' }}"
          href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'rate']) }}">
          <i class="fa-solid fa-star mr-1"></i>高評価順
        </a>
        <a class="order {{ $orderBy === 'updated_at' ? 'order-true' : 'order-false' }}"
          href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'updated_at']) }}">
          <i class="fa-solid fa-calendar-plus mr-1"></i>新着投稿順
        </a>
      </div>
    </div>

    <div class="mx-5">
      <ul>
        @foreach ( $reviews as $i_review )
          <li>
            <x-review.card_in_user_review :review=$i_review />
          </li>
        @endforeach
      </ul>
    </div>
    {{ $reviews->appends(request()->query())->links() }}
  @endif
</x-layout>

