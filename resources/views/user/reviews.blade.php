<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <div class="justify-end flex">
    @auth
      @if ( Auth::user()->following()->where('following_user_id', $user->id)->exists() )
        <form action="{{ route('follow.destroy', ['user' => $user]) }}" method="post">
          @method('DELETE')
          @csrf
          <x-common.buttons.red type="submit">フォローを解除する</x-common.buttons.red>
        </form>
      @else
        <form action="{{ route('follow.store', ['user' => $user]) }}" method="post">
          @csrf
          <x-common.buttons.blue type="submit">フォローする</x-common.buttons.blue>
        </form>
      @endif
    @endauth
  </div>

  <x-user.nav_tabs :user=$user />

  <div class="flex justify-end">
    <form action="{{ route('user.reviews', ['user' => $user]) }}" method="get" class="mr-2">
      <!-- TODO: なぜ、action="{{ route('user.reviews', ['user' => $user, 'order' => 'like']) }}"ではだめなのか？ -->
      <input type="hidden" name="order" value="like">
      <x-common.buttons.blue type="submit">いいね順</x-common.buttons.blue>
    </form>
    <form action="{{ route('user.reviews', ['user' => $user]) }}" method="get">
      <input type="hidden" name="order" value="updated_at">
      <x-common.buttons.blue type="submit">更新日順</x-common.buttons.blue>
    </form>
  </div>

  <div>
    @foreach ( $reviews as $i_review )
      <x-review.card_in_review_edit :review=$i_review />
      <hr class="border-t border-blue-gray-200">
    @endforeach
    {{ $reviews->links() }}
  </div>
</x-layout>

