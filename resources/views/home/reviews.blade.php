<x-layout :title="'Home'">
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromHomeController=$fromHomeController />

  <x-home.nav_tabs />

  <div class="mx-5 mt-4">
    @if ( $reviews->count() === 0 )
      <p class="text-slate-400 dark:text-slate-400">レビューを投稿すると、ここにレビュー一覧が表示されます。</p>
    @else
      <ul class="-mt-4">
        @foreach ( $reviews as $i_review )
          <li>
            <x-review.card_in_review_edit :review=$i_review />
          </li>
        @endforeach
      </ul>
      {{ $reviews->appends(request()->query())->links() }}
    @endif
  </div>
</x-layout>

