<x-layout title='Classic Music Review App'>
  <h1>Artist Detail</h1>

  <h2>{{ $artist->name }}</h2>

  <div>
    @foreach ( $recordings as $i_recording )
      <details>
        <summary>{{ $i_recording->title }}, {{ $i_recording->id }}</summary>
        <div>
          <!-- TODO 画像が存在しない倍の処理 -->
          <img src="{{ asset('storage/jackets/' . $i_recording->jacket_filename) }}" alt="" width="300">
        </div>
        <div>
          <a href="">レビューを見る(TODO: 未実装)</a>
        </div>
      </details>
    @endforeach
  </div>
</x-layout>

