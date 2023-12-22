<div>
  <div class="flex">
    <div class="w-1/6">
      <a href="{{ route('recording.show', ['recording' => $recording]) }}">
        <img class="object-cover w-full" src="{{ jacket_url($recording->jacket_filename) }}" alt="{{ $recording->title }}">
      </a>
    </div>
    <div class="w-5/6 pl-4">
      <a href="{{ route('recording.show', ['recording' => $recording]) }}">
        <h3 class="url ss:text-2xl font-bold">{{ $recording->artists_string }}</h3>
      </a>
      <p>タイトル: {{ $recording->title }}</p>
      <p>発売日: {{ $recording->release_date_string }}</p>
      <div class="ss:flex ss:items-center">
        <div class="flex items-center">
          <p class="mr-1">レビュー: {{ $recording->average_rate_string }}</p>
          <x-common.rate :rate="$recording->average_rate" />
        </div>
        <p class="ml-1 text-slate-500 dark:text-slate-400">({{ $recording->reviews->count() }}人の評価)</p>
      </div>
    </div>
  </div>
  <hr class="border-t item-border-color mt-2 mb-2">
</div>
