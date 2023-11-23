<x-layout title='Classic Music Review App'>
  <h1>Music Show</h1>

  <h2>{{ $music->composer->name }}  {{ $music->title }}, {{ $music->opus }}</h2>

  <div>
    @foreach ( $recordings as $i_recording )
      <details>
        <summary>{{ $i_recording->artistsString }}</summary>
        <div>
          <p>{{ $i_recording->title }} (rate: {{ $i_recording->average_rate }})</p>
        </div>
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