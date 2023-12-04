<div class="relative flex w-full max-w-[60rem] flex-col rounded-xl bg-transparent bg-clip-border text-gray-700 shadow-none">
  <div class="relative mx-0 mt-4 flex items-center gap-4 overflow-hidden rounded-xl bg-transparent bg-clip-border pt-0 pb-8 text-gray-700 shadow-none">
    <img
      src="{{ user_icon_url($review->user->icon_filename) }}"
      alt="{{ $review->user->name }}"
      class="relative inline-block h-[58px] w-[58px] !rounded-full object-cover object-center"
    />
    <div class="flex w-full flex-col gap-0.5">
      <div class="flex items-center justify-between">
        <a href="{{ route('user.show', ['user' => $review->user]) }}">
          <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
              {{ $review->user->name }}
          </h5>
        </a>
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
    <a href="{{ route('recording.show', ['recording' => $review->recording]) }}" class="block font-sans text-base font-semibold leading-relaxed text-inherit antialiased">
      {{ $review->recording->title }}
    </a>
  </div>
  <div class="p-0">
    <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
      {{ $review->recording->artists_string }}
    </p>
  </div>
  <div class="flex">
    <div class="w-1/4 flex items-start">
      <img class="object-contain" src="{{ jacket_url($review->recording->jacket_filename) }}" alt="{{ $review->recording->title }}" />
    </div>
    <div class="w-3/4">
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
      <x-common.like :review=$review />
    </div>
  </div>
</div>
