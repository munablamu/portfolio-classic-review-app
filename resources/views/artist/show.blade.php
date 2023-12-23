<x-layout :title="$artist->name">
  <div class="mx-5 pt-2 mb-2">
    <h1 class="text-3xl sm:text-6xl font-Ubuntu font-bold tracking-wide text-slate-500 dark:text-slate-400">{{ $artist->name }}</h1>
  </div>
  @auth
    <div class="flex justify-end mb-5 mx-5">
      @php
        $favorited = Auth::user()->favoriteArtists()->where('artist_id', $artist->id)->first();
      @endphp
      @if ( $favorited )
        <form action="{{ route('favoriteArtist.destroy', ['artist' => $artist]) }}" method="post">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-rose">
            <i class="fa-solid fa-bookmark"></i><span class="ml-1">お気に入り解除</span>
            </button>
        </form>
      @else
        <form action="{{ route('favoriteArtist.store', ['artist' => $artist]) }}" method="post">
          @csrf
          <button type="submit" class="btn btn-indigo">
              <i class="fa-regular fa-bookmark"></i><span class="ml-1">お気に入り登録</span>
            </button>
        </form>
      @endif
    </div>
  @endauth

  <div class="flex justify-end mx-5">
    @php
      $orderBy = request()->query('orderBy', 'release_date');
    @endphp
    <ul class="my-4 py-1 overflow-x flex flex-row ss:justify-end">
      <li class="whitespace-nowrap">
        <a class="order {{ $orderBy === 'release_date' ? 'order-true' : 'order-false' }}"
          href="{{ route('artist.show', ['artist' => $artist, 'orderBy' => 'release_date']) }}">
          <i class="fa-solid fa-calendar-plus mr-1"></i>発売日順
        </a>
      </li>
      <li class="whitespace-nowrap">
        <a class="order {{ $orderBy === 'average_rate' ? 'order-true' : 'order-false' }}"
          href="{{ route('artist.show', ['artist' => $artist, 'orderBy' => 'average_rate']) }}">
          <i class="fa-solid fa-star mr-1"></i>高評価順
        </a>
      </li>
    </ul>
  </div>

  <ul class="mx-5">
    @foreach ( $recordings as $i_recording )
      <li>
        <x-recording.card_in_artist :recording=$i_recording />
      </li>
    @endforeach
    {{ $recordings->appends(request()->query())->links('vendor.pagination.original') }}
  </ul>
</x-layout>

<x-common.help message="演奏家「{{ $artist->name }}」の詳細ページです。この演奏家の関わった録音の一覧が表示されています。ログイン状態では、この演奏家を「<strong class='strong-color-invert'>お気に入り登録</strong>」することができます。" />
