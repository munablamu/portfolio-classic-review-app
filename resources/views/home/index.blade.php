<x-layout title='Classic Music Review App'>
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
      {{ $following_user_reviews->links() }}
    @endif
  </div>
</x-layout>
