<div class="flex mx-5 my-2 pt-2 justify-between">
  <div class="flex">
    <div>
      <img src="{{ user_icon_url($user->icon_filename) }}" alt="{{ $user->name }}" width="100" class="w-24 h-24 rounded-full">
    </div>
    <div class="ml-2 my-2">
      <h2 class="text-3xl font-bold">{{ $user->name }}</h2>
      <p class="">レビュー: {{ $reviewCount }}件 (評価: {{ $allReviewCount }}件)</p>
      <p class="text-pink-400"><i class="far fa-heart like-btn mr-1"></i>{{ $likeSum }}</p>
    </div>
  </div>
  <div class="flex flex-col justify-end">
    @if ( Auth::check() && Auth::id() !== $user->id )
      @if ( Auth::user()->following()->where('following_user_id', $user->id)->exists() )
        <form action="{{ route('follow.destroy', ['user' => $user]) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-fat btn-rose">フォローを解除する</button>
        </form>
      @else
        <form action="{{ route('follow.store', ['user' => $user]) }}" method="post">
          @csrf
          <button type="submit" class="btn btn-fat btn-indigo">フォローする</button>
        </form>
      @endif
    @endif
  </div>
</div>
