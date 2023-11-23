<x-layout title='Classic Music Review App'>
  <h1>Artist Detail</h1>

  <h2>{{ $artist->name }}</h2>

  <div>
    @foreach ( $recordings as $i_recording )
      <details>
        <summary>{{ $i_recording->title }}, {{ $i_recording->id }}</summary>
        <div>
          <img src="{{ jacket_url($i_recording->jacket_filename) }}" alt="" width="300">
        </div>
        <div>
          <a href="{{ route('recording.show', ['recording' => $i_recording]) }}">レビューを見る</a>
        </div>
      </details>
    @endforeach
    {{ $recordings->links() }}
  </div>
</x-layout>

