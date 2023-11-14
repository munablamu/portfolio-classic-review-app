<x-layout title='Classic Music Review App'>
  <h1>Recording Detail</h1>

  <h2>{{ $title }}</h2>

  <div>
    @foreach ( $artists as $i_artist )
      <p>{{ $i_artist->name }}</p>
    @endforeach
  </div>

  <div>
    <p>発売日: {{ $release_date }}</p>
    <p>カタログ番号: {{ $catalogue_no }}</p>
  </div>

  <div>
    <!-- TODO 画像が存在しない倍の処理 -->
    <img src="{{ asset('storage/jackets/' . $jacket_filename) }}" alt="" width="300">
  </div>

  <div>
    @foreach ( $reviews as $i_review )
      <details>
        <summary>{{ $i_review->user->name }}, {{ $i_review->title }}, {{ $i_review->rate }}, {{ $i_review->like }}</summary>
        <div>
          <p>{{ $i_review->content }}</p>
        </div>
      </details>
    @endforeach
  </div>
  {{ $reviews->links() }}
</x-layout>
