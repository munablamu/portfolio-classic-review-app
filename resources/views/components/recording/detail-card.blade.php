<div class="flex flex-col sm:flex-row m-5">
  <div class="w-full sm:w-1/3">
    <img class="object-cover w-full" src="{{ jacket_url($recording->jacket_filename) }}" alt="{{ $recording->title }}">
  </div>
  <div class="w-full sm:w-2/3 sm:pl-4 flex flex-col">
    <h1 class="text-5xl font-Ubuntu font-bold text-slate-500 dark:text-slate-400">
      <!-- TODO: ここの処理をHTMLに書かずに済むようにしたい -->
      @if ( $recording->artists !== null )
        @foreach ( $recording->artists as $i_artist )
          <a href="{{ route('artist.show', ['artist' => $i_artist]) }}" class="underline">{{ $i_artist->name }}</a>@if ( !$loop->last ), @endif
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
      <p class="ml-1 text-slate-500 dark:text-slate-400">({{ $recording->reviews->count() }}人の評価)</p>
    </div>

    @php
      $search_keyword = $recording->title . ' ' . $recording->artists_string . ' ' . $recording->release_year;
    @endphp
    <div class="flex items-center">
      <a href="https://music.amazon.co.jp/search/{{ $search_keyword }}/albums" class="m-2">
        <img class="h-8" src="{{ subscription_icon_url('Amazon_Music.png') }}" alt="Amazon Musicで検索">
      </a>
      <a href="https://music.apple.com/jp/search?term={{ $search_keyword }}" class="m-2">
        <img class="h-8" src="{{ subscription_icon_url('Apple_Music.svg') }}" alt="Apple Musicで検索">
      </a>
      <a href="https://open.spotify.com/search/{{ $search_keyword }}/albums" class="m-2">
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
            <i class="fa-regular fa-bookmark"></i><span class="ml-1">お気に入り解除</span>
            </button>
          </form>
        @else
          <form action="{{ route('favoriteRecording.store', ['recording' => $recording]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-indigo">
              <i class="fa-solid fa-bookmark"></i><span class="ml-1">お気に入り登録</span>
            </button>
          </form>
        @endif
      </div>
    @endauth
  </div>
</div>
