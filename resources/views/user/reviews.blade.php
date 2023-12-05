<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <x-user.nav_tabs :user=$user />

  <div class="flex justify-end mx-5">
    @php
      $orderBy = request()->query('orderBy', 'like');
    @endphp
    <div class="my-4 text-right">
      <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 {{ $orderBy === 'like' ? ' bg-slate-500 text-slate-50' : 'bg-slate-150 text-slate-500' }}"
        href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'like']) }}">いいね順</a>
      <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 {{ $orderBy === 'rate' ? ' bg-slate-500 text-slate-50' : 'bg-slate-150 text-slate-500' }}"
        href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'rate']) }}">高評価順</a>
      <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 {{ $orderBy === 'updated_at' ? ' bg-slate-500 text-slate-50' : 'bg-slate-150 text-slate-500' }}"
        href="{{ route('user.reviews', ['user' => $user, 'orderBy' => 'updated_at']) }}">新着投稿順</a>
    </div>
  </div>

  <div class="mx-5">
    <ul>
      @foreach ( $reviews as $i_review )
        <li>
          <x-review.card_in_user_review :review=$i_review />
          <hr class="border-t border-blue-gray-200">
        </li>
      @endforeach
    </ul>
  </div>
  {{ $reviews->appends(request()->query())->links() }}
</x-layout>

