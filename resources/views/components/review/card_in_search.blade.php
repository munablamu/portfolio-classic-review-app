<div class="flex flex-col mx-5">

  <div class="flex flex-col sm:flex-row">
    <div class="w-1/2 sm:w-1/4 mx-auto">
      <img class="object-contain" src="{{ jacket_url($review->recording->jacket_filename) }}" alt="{{ $review->recording->title }}" />
    </div>
    <div class="w-full sm:w-3/4 ml-3">
      <div class="flex items-center gap-4 overflow-hidden pt-0 pb-2">
        <img
          src="{{ user_icon_url($review->user->icon_filename) }}"
          alt="{{ $review->user->name }}"
          class="h-[48px] w-[48px] !rounded-full object-cover object-center"
        />
        <div class="w-full flex-col">
          <div class="flex items-center justify-between">
            <a href="{{ route('user.show', ['user' => $review->user]) }}" class="text-slate-500 underline text-lg font-semibold">
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
        <a href="{{ route('recording.show', ['recording' => $review->recording]) }}" class="font-semibold underline">
          {{ $review->recording->title }}
        </a>
      </div>
      <div class="p-0">
        <p class="leading-relaxed">
          {{ $review->recording->artists_string }}
        </p>
      </div>
      <div class="p-0">
        <p class="font-semibold leading-relaxed">
          {!! $review->title !!}
        </p>
      </div>
      <div class="p-0">
        <p class="leading-relaxed">
          {!! $review->content !!}
        </p>
      </div>
      <x-common.like :review=$review />
    </div>
  </div>
  <hr class="border-t border-slate-200 my-4">
</div>
