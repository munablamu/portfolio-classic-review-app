<div class="flex flex-col">
  <div class="my-4 flex items-center gap-4">
    <div class="flex w-full gap-0.5 flex-col sm:flex-row">
      <div class="w-1/2 sm:w-1/4 mx-auto flex items-start">
        <a href="{{ route('recording.show', ['recording' => $review->recording]) }}">
          <img class="object-contain" src="{{ jacket_url($review->recording->jacket_filename) }}" alt="{{ $review->recording->title }}" />
        </a>
      </div>
      <div class="w-full sm:w-3/4 sm:ml-3">
        <div class="flex items-center justify-between">
          <p class="text-sm font-light leading-relaxed">
            @if ( \Carbon\Carbon::parse($review->updated_at)->gt(\Carbon\Carbon::now()->subMonths(3)) )
              <span class="bg-mauve-500 text-mauve-50 py-0.5 px-2 rounded-full mr-1 font-base uppercase">new</span>
            @endif
            @if ( $review->created_at == $review->updated_at )
              投稿日: {{ $review->created_at_string }}
            @else
              更新日: {{ $review->updated_at_string }}
            @endif
          </p>
          <x-common.rate :rate="$review->rate" />
        </div>
        <div class="p-0">
          <a href="{{ route('recording.show', ['recording' => $review->recording]) }}" class="url font-semibold leading-relaxed">
            {{ $review->recording->title }}
          </a>
        </div>
        <div class="p-0">
          <p>
            {{ $review->recording->artists_string }}
          </p>
        </div>
        <div class="p-0">
          <p class="font-semibold leading-relaxed">
            {{ $review->title }}
          </p>
        </div>
        <div class="p-0">
          <p class="">
            {{ $review->content }}
          </p>
        </div>
        @if ( Auth::check() && Auth::id() === $review->user->id )
          <div class="justify-end flex">
            <a href="{{ route('review.edit', ['recording' => $review->recording]) }}" class="btn btn-indigo">編集</a>
            <form action="{{ route('review.delete', ['review' => $review]) }}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-rose">削除</button>
            </form>
          </div>
        @else
          <x-common.like :review=$review />
        @endif
      </div>
    </div>
  </div>
  <hr class="border-t border-slate-200">
</div>
