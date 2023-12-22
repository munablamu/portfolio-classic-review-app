<x-layout :title="$user->name">
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromUserController=$fromUserController />

  <x-user.nav_tabs :user=$user />

  @if ( $reviews->count() === 0 )
    <p class="text-slate-400 dark:text-slate-400 mx-5 mt-4">このユーザーはまだレビューを投稿していません。</p>
  @else
    <div class="flex justify-end mx-5">
      @php
        $orderBy = request()->query('orderBy', 'like');
      @endphp
      <ul class="my-4 py-1 overflow-x flex flex-row ss:justify-end">
        <li class="whitespace-nowrap">
          <a class="order {{ $orderBy === 'like' ? 'order-true' : 'order-false' }}"
            href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'like']) }}">
            <i class="fa-solid fa-heart mr-1"></i>いいね順
          </a>
        </li>
        <li class="whitespace-nowrap">
          <a class="order {{ $orderBy === 'rate' ? 'order-true' : 'order-false' }}"
            href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'rate']) }}">
            <i class="fa-solid fa-star mr-1"></i>高評価順
          </a>
        </li>
        <li class="whitespace-nowrap">
          <a class="order {{ $orderBy === 'updated_at' ? 'order-true' : 'order-false' }}"
            href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'updated_at']) }}">
            <i class="fa-solid fa-calendar-plus mr-1"></i>新着投稿順
          </a>
        </li>
      </ul>
    </div>

    <div class="mx-5 mb-4">
      <ul>
        @foreach ( $reviews as $i_review )
          <li>
            <x-review.card_in_user_review :review=$i_review />
          </li>
        @endforeach
      </ul>
    </div>
    <div class="mx-5">
      {{ $reviews->appends(request()->query())->links('vendor.pagination.original') }}
    </div>
  @endif
</x-layout>

<x-common.help message="ユーザーが過去に投稿したレビューの一覧です。「<strong class='strong-color-invert'>いいね順</strong>」、「<strong class='strong-color-invert'>高評価順</strong>」、「<strong class='strong-color-invert'>新着投稿順</strong>」で並べ替えが可能です。" />
