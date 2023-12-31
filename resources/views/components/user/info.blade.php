<div class="flex flex-col sm:flex-row mx-5 my-2 pt-2 justify-between">
  <div class="flex">
    <div>
      <img src="{{ user_icon_url($user->icon_filename) }}" alt="{{ $user->name }}" width="100" class="w-24 h-24 rounded-full">
    </div>
    <div class="ml-2 my-2">
      <h2 class="text-3xl font-bold">{{ $user->name }}</h2>
      <p><i class="fa-solid fa-pen-nib mr-1"></i>{{ $reviewCount }}件 (評価: {{ $allReviewCount }}件)</p>
      <p class="text-pink-400"><i class="fas fa-heart unlike-btn mr-1"></i>{{ $likeSum }}</p>
    </div>
  </div>
  @if ( Auth::check() && Auth::id() !== $user->id )
    <div class="flex flex-row sm:flex-col justify-end">
      @if ( Auth::user()->following()->where('following_user_id', $user->id)->exists() )
        <form action="{{ route('follow.destroy', ['user' => $user]) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-rose">フォローを解除する</button>
        </form>
      @else
        <form action="{{ route('follow.store', ['user' => $user]) }}" method="post">
          @csrf
          <button type="submit" class="btn btn-indigo">フォローする</button>
        </form>
      @endif
    </div>
  @endif

  @auth
    @if ( Auth::id() === $user->id && !empty($fromUserController) && $fromUserController )
      <div class="flex flex-row sm:flex-col justify-end">
        <a class="btn btn-emerald" href="{{ route('home') }}">
          <i class="fa-solid fa-house"></i><span class="ml-1">Home</span>
        </a>
      </div>
    @endif
    @if ( !empty($fromHomeController) && $fromHomeController )
      <div class="flex flex-row sm:flex-col justify-end">
        <a class="btn btn-emerald" href="{{ route('user.show', ['user' => $user]) }}">
          <i class="fa-solid fa-check"></i><span class="ml-1">現在の表示を確認</span>
        </a>
      </div>
    @endif
  @endauth
</div>
