<x-layout title='Classic Music Review App'>
  <h1>User Detail</h1>

  <h2>{{ $user_name }}</h2>

  <div>
    @foreach ( $reviews as $i_review )
      <details>
        <summary>{{ $i_review->recording->title }}, {{ $i_review->rate }}, {{ $i_review->like }}</summary>
        <div>
          <p>{{ $i_review->review }}</p>
        </div>
      </details>
    @endforeach
  </div>
</x-layout>

