<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <x-home.nav_tabs />

  <div class="mx-5">
    @if ( $reviews->count() === 0 )
      <p>レビューを投稿すると、ここにレビュー一覧が表示されます</p>
    @else
      @foreach ( $reviews as $i_review )
        <x-review.card_in_review_edit :review=$i_review />
      @endforeach
      {{ $reviews->links() }}
    @endif
  </div>
</x-layout>

