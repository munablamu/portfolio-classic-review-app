<x-layout :title="'Home'">
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromHomeController=$fromHomeController />

  <x-home.nav_tabs />

  <div class="mx-5 mt-4">
    @if ( $reviews->count() === 0 )
      <p class="text-slate-400 dark:text-slate-400">レビューを投稿すると、ここにレビュー一覧が表示されます。</p>
    @else
      <ul class="-mt-4 mb-4">
        @foreach ( $reviews as $i_review )
          <li>
            <x-review.card_in_review_edit :review=$i_review />
          </li>
        @endforeach
      </ul>
      {{ $reviews->appends(request()->query())->links('vendor.pagination.original') }}
    @endif
  </div>
</x-layout>


<x-common.help message="過去に投稿したレビューの一覧が表示されます。このページからも<strong class='strong-color-invert'>レビューの編集・削除</strong>が可能ですが、各録音（CDやアルバム）の詳細ページでも自分のレビューの編集・削除が可能です。" />
