<div class="flex flex-col sm:flex-row m-5">
  <div class="flex justify-center sm:block sm:w-1/3">
    <img class="object-cover w-1/2 sm:w-full" src="{{ jacket_url($recording->jacket_filename) }}" alt="{{ $recording->title }}">
  </div>
  <div class="w-full sm:w-2/3 sm:pl-4 flex flex-col">
    <h1 class="mb-1 text-xl sm:text-3xl font-Ubuntu font-bold text-slate-500 dark:text-slate-400">
      @if ( $recording->artists !== null )
        @foreach ( $recording->artists as $i_artist )
          <a href="{{ route('artist.show', ['artist' => $i_artist]) }}" class="underline hover:text-slate-600 dark:hover:text-slate-300">{{ $i_artist->name }}</a><br />
        @endforeach
      @else
        {{ '不明' }}
      @endif
    </h1>
    <h2 class="text-lg ss:text-xl font-bold mb-2 text-mauve-600">{{ $recording->title }}</h2>
    <p class="">発売日: {{ $recording->release_date_string }}</p>
    <p class="">カタログ番号: {{ $recording->catalogue_no }}</p>
    <div class="ss:flex ss:items-center">
      <div class="flex items-center">
        <p class="mr-1">レビュー: {{ $recording->average_rate_string }}</p>
        <x-common.rate :rate="$recording->average_rate" />
      </div>
      <p class="ml-1 text-slate-500 dark:text-slate-400">({{ $recording->reviews->count() }}人の評価)</p>
    </div>

    @php
      $search_keyword = $recording->title . ' ' . $recording->artists_string . ' ' . $recording->release_year;
    @endphp
    <div class="flex items-center">
      <a href="https://music.amazon.co.jp/search/{{ $search_keyword }}/albums" target=“_blank” rel=“noopener” class="m-2">
        <img class="h-8" src="{{ subscription_icon_url('Amazon_Music.png') }}" alt="Amazon Musicで検索">
      </a>
      <a href="https://music.apple.com/jp/search?term={{ $search_keyword }}" target=“_blank” rel=“noopener” class="m-2">
        <img class="h-8" src="{{ subscription_icon_url('Apple_Music.svg') }}" alt="Apple Musicで検索">
      </a>
      <a href="https://open.spotify.com/search/{{ $search_keyword }}/albums" target=“_blank” rel=“noopener” class="m-2">
        <img class="h-8" src="{{ subscription_icon_url('spotify.png') }}" alt="spotifyで検索">
      </a>
    </div>

    @auth
      <div class="text-right">
        @php
          $favorited = Auth::user()->favoriteRecordings()->where('recording_id', $recording->id)->first();
        @endphp
        @if ( $favorited )
          <form action="{{ route('favoriteRecording.destroy', ['recording' => $recording]) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-rose">
            <i class="fa-solid fa-bookmark"></i><span class="ml-1">お気に入り解除</span>
            </button>
          </form>
        @else
          <form action="{{ route('favoriteRecording.store', ['recording' => $recording]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-indigo">
              <i class="fa-regular fa-bookmark"></i><span class="ml-1">お気に入り登録</span>
            </button>
          </form>
        @endif
      </div>
    @endauth
  </div>
</div>
