<x-layout title='Classic Music Review App'>
  <h1>Recording List</h1>

  <h2>{{ $music->composer->name }}  {{ $music->title }}, {{ $music->opus }}</h2>

  <div>
    @foreach ( $recordings as $i_recording )
      <details>
        <summary>{{ $i_recording->artist_names_joined_by_comma }}</summary>
        <div>
          <p>{{ $i_recording->title }} (rate: {{ $i_recording->average_rate }})</p>
        </div>
        <div>
          <!-- TODO 画像が存在しない倍の処理 -->
          <img src="{{ asset('storage/jackets/' . $i_recording->jacket_filename) }}" alt="" width="300">
        </div>
        <div>
          <a href="{{ route('recording.show', ['recording' => $i_recording]) }}">レビューを見る</a>
        </div>
      </details>
    @endforeach
  </div>
  {{ $recordings->links() }}
</x-layout>
