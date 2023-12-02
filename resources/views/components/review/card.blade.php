<div class="flex flex-col mx-5">
  <div class="flex items-center gap-4 overflow-hidden pt-0 pb-2">
    <img
      src="{{ user_icon_url($review->user->icon_filename) }}"
      alt="{{ $review->user->name }}"
      class="h-[48px] w-[48px] !rounded-full object-cover object-center"
    />
    <div class="w-full">
      <div class="flex items-center justify-between">
        <a href="{{ route('user.show', ['user' => $review->user]) }}" class=" text-slate-500 underline text-lg font-semibold">
            {{ $review->user->name }}
        </a>
        <x-common.rate :rate="$review->rate" />
      </div>
      <p class="text-sm font-light items-center leading-relaxed">
        @if ( \Carbon\Carbon::parse($review->updated_at)->gt(\Carbon\Carbon::now()->subMonths(3)) )
          <span class="bg-mauve-500 text-mauve-50 py-0.5 px-2 rounded-full mr-1 font-base uppercase">new</span>
        @endif
        @if ( $review->created_at == $review->updated_at )
          投稿日: {{ $review->created_at_string }}
        @else
          更新日: {{ $review->updated_at_string }}
        @endif
      </p>
    </div>
  </div>
  <div class="p-0">
    <p class="font-bold leading-relaxed">
      {{ $review->title }}
    </p>
  </div>
  <div class="p-0">
    <p class="font-normal leading-relaxed">
      {{ $review->content }}
    </p>
  </div>
  <div class=" my-1 flex justify-end font-medium text-pink-400">
    @if ( Auth::check() && ($review->user->id !==  Auth::id()) )
      <!-- TODO: 多分ここでチェックするの良くない -->
      @php
        $liked = $review->likes()->where('user_id', Auth::id())->first();
      @endphp
      @if ( $liked )
        <form action="{{ route('likes.destroy', ['review' => $review->id]) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit" class="align-middle">
            <i class="fas fa-heart unlike-btn mr-1"></i>{{ $review->like }} いいねを解除する
          </button>
        </form>
      @else
        <form action="{{ route('likes.store', ['review' => $review->id]) }}" method="post">
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
  @if ( Auth::check() && $review->user->id === Auth::id() )
    <div class="flex justify-end items-center">
      <a href="{{ route('review.edit', ['recording' => $review->recording]) }}" class="btn btn-indigo">編集</a>
      <form action="{{ route('review.delete', ['review' => $review]) }}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-rose" type="submit">削除</button>
      </form>
    </div>
  @endif
  <hr class="border-t border-slate-200 mt-4 mb-2">
</div>
