  <div class="flex">
    <div class="w-1/6">
      <a href="{{ route('recording.show', ['recording' => $recording]) }}">
        <img class="object-cover w-full" src="{{ jacket_url($recording->jacket_filename) }}" alt="{{ $recording->title }}">
      </a>
    </div>
    <div class="w-5/6 pl-4">
      <a href="{{ route('recording.show', ['recording' => $recording]) }}">
        <h2 class="text-2xl font-bold">{{ $recording->artists_string }}</h2>
      </a>
      <p class="text-base">タイトル: {{ $recording->title }}</p>
      <p class="text-base">発売日: {{ $recording->release_date_string }}</p>
      <div class="flex">
        <p class="text-base">レビュー: {{ $recording->average_rate }}</p>
        <x-common.rate :rate="$recording->average_rate" />
      </div>
    </div>
  </div>
</a>
