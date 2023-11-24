<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <x-home.nav_tabs />

  <div>
    @if ( $following_user_reviews->count() === 0 )
      <p>ユーザーをフォローすると、ここに新着レビューが表示されます。</p>
    @else
      @foreach ( $following_user_reviews as $i_review )
        <x-review.card_with_recording :review=$i_review />
      @endforeach
      {{ $following_user_reviews->links() }}
    @endif
  </div>
</x-layout>
