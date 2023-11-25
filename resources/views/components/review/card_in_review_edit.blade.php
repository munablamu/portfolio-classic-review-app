<div class="relative flex w-full max-w-[60rem] flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
  <div class="relative mx-0 mt-4 flex items-center gap-4 overflow-hidden rounded-xl bg-transparent bg-clip-border pt-0 text-gray-700 shadow-none">
    <div class="flex w-full gap-0.5">
      <div class="w-1/4 flex items-start">
        <img class="object-contain" src="{{ jacket_url($review->recording->jacket_filename) }}" alt="{{ $review->recording->title }}" />
      </div>
      <div class="w-3/4">
        <div class="flex items-center justify-between">
          <p class="block font-sans text-base font-light leading-relaxed text-blue-gray-900 antialiased">
            @if ( $review->created_at == $review->updated_at )
              投稿日: {{ $review->created_at_string }}
            @else
              更新日: {{ $review->updated_at_string }}
            @endif
          </p>
          <x-common.rate :rate="$review->rate" />
        </div>
        <div class="p-0">
          <a href="{{ route('recording.show', ['recording' => $review->recording]) }}" class="block font-sans text-base font-semibold leading-relaxed text-inherit antialiased">
            {{ $review->recording->title }}
          </a>
        </div>
        <div class="p-0">
          <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
            {{ $review->recording->artists_string }}
          </p>
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
        <div class="justify-end flex">
          <x-common.buttons.blue>
            <a href="{{ route('review.edit', ['recording' => $review->recording]) }}">編集</a>
          </x-common.buttons.blue>
          <form action="{{ route('review.delete', ['review' => $review]) }}" method="post">
            @method('DELETE')
            @csrf
            <x-common.buttons.red type="submit">削除</x-common.buttons.red>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>