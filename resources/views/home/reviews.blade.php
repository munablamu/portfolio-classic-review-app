<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <x-home.nav_tabs />

  <div class="mx-5 mt-4">
    @if ( $reviews->count() === 0 )
      <p>レビューを投稿すると、ここにレビュー一覧が表示されます</p>
    @else
      <ul class="-mt-4">
        @foreach ( $reviews as $i_review )
          <li>
            <x-review.card_in_review_edit :review=$i_review />
          </li>
        @endforeach
      </ul>
      {{ $reviews->links() }}
    @endif
  </div>
</x-layout>

