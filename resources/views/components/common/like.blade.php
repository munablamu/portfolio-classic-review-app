  <div class=" my-1 flex justify-end font-medium text-pink-400">
    @if ( Auth::check() && ($review->user->id !==  Auth::id()) )
      <!-- TODO: 多分ここでチェックするの良くない -->
      @php
        $liked = $review->likes()->where('user_id', Auth::id())->first();
      @endphp
      @if ( $liked )
        <form action="{{ route('likes.destroy', ['review' => $review]) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit" class="align-middle">
            <i class="fas fa-heart unlike-btn mr-1"></i>{{ $review->like }} いいねを解除する
          </button>
        </form>
      @else
        <form action="{{ route('likes.store', ['review' => $review]) }}" method="post">
          @csrf
          <button type="submit" class="align-middle">
            <i class="far fa-heart like-btn mr-1"></i>{{ $review->like }} いいね
          </button>
        </form>
      @endif
    @else
      <span class="align-middle">
        <i class="far fa-heart like-btn mr-1"></i>{{ $review->like }}
      </span>
    @endif
  </div>
