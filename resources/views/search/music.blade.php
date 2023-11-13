<x-layout title='Classic Music Review App'>
  <h1>Search by Music</h1>

  <x-search.form :q='$q' />

  <div>
    @foreach ( $musics as $i_music )
      <details>
        <summary>{{ $i_music->title }}, {{ $i_music->opus}} (Composer: {{ $i_music->composer->name }})</summary>
        <div>
          <a href="{{ route('recording', ['music_id' => $i_music->id]) }}">CDを見る</a>
        </div>
      </details>
    @endforeach
  </div>
  {{ $musics->links() }}
</x-layout>
