<x-layout title='Classic Music Review App'>
  <h1>Search by Artist</h1>

  <x-search.form :q='$q' />

  <div>
    @foreach ( $artists as $i_artist )
      <details>
        <summary>{!! $i_artist->name !!}, {{ $i_artist->id }}</summary>
        <div>
          <a href="{{ route('artist.show', ['artist' => $i_artist]) }}">詳細を見る</a>
        </div>
      </details>
    @endforeach
    {{ $artists->links() }}
  </div>
</x-layout>
