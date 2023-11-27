<div class="flex">
  <div class="w-1/3">
    <img class="object-cover w-full" src="{{ jacket_url($recording->jacket_filename) }}" alt="{{ $recording->title }}">
  </div>
  <div class="w-2/3 pl-4">
    <h2 class="text-5xl font-bold">
      <!-- TODO: ここの処理をHTMLに書かずに済むようにしたい -->
      @if ( $recording->artists !== null )
        @foreach ( $recording->artists as $i_artist )
          <a href="{{ route('artist.show', ['artist' => $i_artist]) }}">{{ $i_artist->name }}</a>@if ( !$loop->last ), @endif
        @endforeach
      @else
        {{ '不明' }}
      @endif
    </h2>
    <p class="text-xl font-bold mb-2">{{ $recording->title }}</p>
    <p class="text-base">発売日: {{ $recording->release_date_string }}</p>
    <p class="text-base">カタログ番号: {{ $recording->catalogue_no }}</p>
    <div class="flex">
      <p class="text-base">レビュー: {{ $recording->average_rate }}</p>
      <x-common.rate :rate="$recording->average_rate" />
    </div>
  </div>
</div>
