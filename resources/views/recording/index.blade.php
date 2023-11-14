<x-layout title='Classic Music Review App'>
  <h1>Recording List</h1>

  <h2>{{ $composer }}  {{ $title }}, {{ $opus }}</h2>

  <div>
    @foreach ( $recordings as $i_recording )
      <details>
        <summary>{{ $i_recording->title }}</summary>
        <div>
          @if ( $i_recording->artists !== null )
            @foreach ( $i_recording->artists as $j_artist )
              <p>{{ $j_artist->name }}</p>
            @endforeach
          @endif
        </div>
        <div>
          <!-- TODO 画像が存在しない倍の処理 -->
          <img src="{{ asset('storage/jackets/' . $i_recording->jacket_filename) }}" alt="" width="300">
        </div>
        <div>
          <a href="{{ route('recording.show', ['id' => $i_recording->id]) }}">レビューを見る</a>
        </div>
      </details>
    @endforeach
  </div>
</x-layout>
