<x-layout title='Classic Music Review App'>
  <div class="mx-5 pt-2 mb-5">
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
          <button type="submit" class="btn btn-rose">お気に入り解除</button>
        </form>
      @else
        <form action="{{ route('favoriteArtist.store', ['artist' => $artist]) }}" method="post">
          @csrf
          <button type="submit" class="btn btn-indigo">お気に入り登録</button>
        </form>
      @endif
    </div>
  @endauth

  <ul class="mx-5">
    @foreach ( $recordings as $i_recording )
      <li>
        <x-recording.card_in_artist :recording=$i_recording />
      </li>
    @endforeach
    {{ $recordings->appends(request()->query())->links() }}
  </ul>
</x-layout>

