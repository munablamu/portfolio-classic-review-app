<div class="flex flex-col mx-5">
  <div class="flex flex-shrink-0 items-center gap-4 overflow-hidden pt-0 pb-2">
    <img
      src="{{ user_icon_url($review->user->icon_filename) }}"
      alt="{{ $review->user->name }}"
      class="h-[48px] w-[48px] !rounded-full object-cover object-center"
    />
    <div class="w-full">
      <div class="flex items-center justify-between">
        <a href="{{ route('user.show', ['user' => $review->user]) }}" class=" text-slate-500 dark:text-slate-400 underline text-lg font-semibold">
            {{ $review->user->name }}
        </a>
        <x-common.rate :rate="$review->rate" />
      </div>
      <p class="text-sm font-light items-center leading-relaxed">
        @if ( \Carbon\Carbon::parse($review->updated_at)->gt(\Carbon\Carbon::now()->subMonths(3)) )
          <span class="bg-mauve-500 text-mauve-50 dark:bg-mauve-600 dark:text-mauve-100 py-0.5 px-2 rounded-full mr-1 font-base uppercase">new</span>
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
    <a class="font-bold leading-relaxed url" href="{{ route('review.show', ['review' => $review ]) }}">
      {{ $review->title }}
    </a>
  </div>
  <div class="p-0">
    <p class="font-normal leading-relaxed {{ $clamp ? 'line-clamp-5' : '' }}">
      {{ $review->content }}
    </p>
  </div>
  <x-common.like :review=$review />
  @if ( Auth::check() && $review->user->id === Auth::id() )
    <div class="flex justify-end items-center">
      <a href="{{ route('review.edit', ['recording' => $review->recording]) }}" class="btn btn-indigo">
      <i class="fa-solid fa-pen-nib"></i><span class="ml-1">編集</span>
      </a>
      <form action="{{ route('review.delete', ['review' => $review]) }}" method="post" onsubmit="return confirm('本当に削除しますか？');">
        @method('DELETE')
        @csrf
        <button class="btn btn-rose" type="submit">
          <i class="fa-solid fa-trash"></i><span class="ml-1">削除</span>
        </button>
      </form>
    </div>
  @endif
  <hr class="border-t item-border-color mt-4 mb-2">
</div>
