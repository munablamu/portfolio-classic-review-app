<x-layout title='Classic Music Review App'>
  <h1>Recording List</h1>

  <h2>{{ $composer }}  {{ $title }}, {{ $opus }}</h2>

  <div>
    @foreach ( $recordings as $i_recording )
      <details>
        <summary>
          @if ( $i_recording->artists !== null )
            @foreach ( $i_recording->artists as $j_artist )
              {{ $j_artist->name }}@if ( !$loop->last), @endif
            @endforeach
          @else
            {{ 'unknown' }}
          @endif
        </summary>
        <div>
          <p>{{ $i_recording->title }} (rate: {{ $i_recording->average_rate }})</p>
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
  {{ $recordings->links() }}
</x-layout>
