<x-layout :title="'Home'">
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromHomeController=$fromHomeController />

  <x-home.nav_tabs />

  <div class="mx-5 mt-4">
    @if ( $following_user_reviews->count() === 0 )
      <p class="text-slate-400 dark:text-slate-400">ユーザーをフォローすると、ここに新着レビューが表示されます。</p>
    @else
      <ul>
      @foreach ( $following_user_reviews as $i_review )
        <li>
          <x-review.card_in_home :review=$i_review />
        </li>
      @endforeach
      </ul>
      {{ $following_user_reviews->appends(request()->query())->links('vendor.pagination.original') }}
    @endif
  </div>
</x-layout>

<x-common.help message="ログインユーザーのHomeページです。フォローしたユーザーのレビューを時系列に見ることができます。ページ上部の数字は、このユーザーが{{ $reviewCount }}件のレビューを投稿しており、レビューでもらった合計のいいねが{{ $likeSum }}件であることを示しています。" />
