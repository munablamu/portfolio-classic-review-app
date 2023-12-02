<div class="flex flex-col sm:flex-row m-5">
  <div class="w-full sm:w-1/3">
    <img class="object-cover w-full" src="{{ jacket_url($recording->jacket_filename) }}" alt="{{ $recording->title }}">
  </div>
  <div class="w-full sm:w-2/3 sm:pl-4">
    <h1 class="text-5xl font-bold text-slate-500">
      <!-- TODO: ここの処理をHTMLに書かずに済むようにしたい -->
      @if ( $recording->artists !== null )
        @foreach ( $recording->artists as $i_artist )
          <a href="{{ route('artist.show', ['artist' => $i_artist]) }}">{{ $i_artist->name }}</a>@if ( !$loop->last ), @endif
        @endforeach
      @else
        {{ '不明' }}
      @endif
    </h1>
    <h2 class="text-xl font-bold mb-2 text-mauve-500">{{ $recording->title }}</h2>
    <p class="">発売日: {{ $recording->release_date_string }}</p>
    <p class="">カタログ番号: {{ $recording->catalogue_no }}</p>
    <div class="flex items-center">
      <p class="mr-1">レビュー: {{ $recording->average_rate }}</p>
      <x-common.rate :rate="$recording->average_rate" />
      <p class="ml-1 text-slate-500">({{ $recording->reviews->count() }}人の評価)</p>
    </div>
  </div>
</div>
