<x-layout title='Classic Music Review App'>
  <h1>Search by Review</h1>

  <x-search.form :q='$q' />

  <div>
    @foreach ( $reviews as $i_review )
      <details>
        <summary>{{ $i_review->user->name }}, {!! $i_review->title !!}</summary>
        <div>
          <p>{{ $i_review->recording->title }}</p>
        </div>
        <div>
          @foreach ( $i_review->recording->artists as $j_artist )
            <p>{{ $j_artist->name }}</p>
          @endforeach
        </div>
        <div>
          <p>{!! $i_review->content !!}</p>
        </div>
        <a href="{{ route('recording.show', ['recording' => $i_review->recording]) }}">他のレビューも見る</a>
      </details>
    @endforeach
  </div>
  {{ $reviews->links() }}
</x-layout>
