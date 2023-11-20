<x-layout title='Classic Music Review App'>
  <h1>Artist List</h1>

  <div>
    @foreach ( $artists as $i_artist )
      <details>
        <summary>{{ $i_artist->name }}</summary>
        <div>
          <a href="{{ route('artist.show', ['artist' => $i_artist]) }}">詳細を見る</a>
        </div>
      </details>
    @endforeach
  </div>
</x-layout>
