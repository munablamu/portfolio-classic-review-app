<div class="relative flex w-full max-w-[60rem] flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
  <div class="relative mx-0 mt-4 flex items-center gap-4 overflow-hidden rounded-xl bg-transparent bg-clip-border pt-0 pb-8 text-gray-700 shadow-none">
    <img
      src="{{ user_icon_url($review->user->icon_filename) }}"
      alt="tania andrew"
      class="relative inline-block h-[58px] w-[58px] !rounded-full object-cover object-center"
    />
    <div class="flex w-full flex-col gap-0.5">
      <div class="flex items-center justify-between">
        <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            {{ $review->user->name }}
        </h5>
        <x-common.rate :rate="$review->rate" />
      </div>
      <p class="block font-sans text-base font-light leading-relaxed text-blue-gray-900 antialiased">
        @if ( $review->created_at == $review->updated_at )
          投稿日: {{ $review->created_at_string }}
        @else
          更新日: {{ $review->updated_at_string }}
        @endif
      </p>
    </div>
  </div>
  <div class="p-0">
    <p class="block font-sans text-base font-semibold leading-relaxed text-inherit antialiased">
      {{ $review->title }}
    </p>
  </div>
  <div class="p-0">
    <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
      {{ $review->content }}
    </p>
  </div>
  <div class=" mb-6 flex justify-end font-sans text-base font-medium text-inherit text-red-400">
    @auth
      <!-- TODO: 多分ここでチェックするの良くない -->
      @php
        $liked = $review->likes()->where('user_id', Auth::id())->first();
      @endphp
      @if ( $liked )
        <form action="{{ route('likes.destroy', ['review' => $review->id]) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit" class="align-middle">
            <i class="fas fa-heart unlike-btn"></i>{{ $review->like }} いいねを解除する
          </button>
        </form>
      @else
        <form action="{{ route('likes.store', ['review' => $review->id]) }}" method="post">
          @csrf
          <button type="submit" class="align-middle">
            <i class="far fa-heart like-btn"></i>{{ $review->like }} いいね
          </button>
        </form>
      @endif
    @else
      <span class="align-middle">
        <i class="far fa-heart like-btn"></i>{{ $review->like }}
      </span>
    @endauth
  </div>
</div>
