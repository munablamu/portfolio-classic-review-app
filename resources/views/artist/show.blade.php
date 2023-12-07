<x-layout title='Classic Music Review App'>
  <div class="flex justify-between items-baseline mx-5 pt-2 mb-5">
    <h1 class="text-3xl sm:text-6xl font-black tracking-wide text-slate-500">{{ $artist->name }}</h1>
    @auth
      <div class="">
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
  </div>

  <ul class="mx-5">
    @foreach ( $recordings as $i_recording )
      <li>
        <x-recording.card_in_artist :recording=$i_recording />
      </li>
    @endforeach
    {{ $recordings->links() }}
  </ul>
</x-layout>

