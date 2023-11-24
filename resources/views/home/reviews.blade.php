<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <x-home.nav_tabs />

  <div>
    @if ( $reviews->count() === 0 )
      <p>レビューを投稿すると、ここにレビュー一覧が表示されます</p>
    @else
      @foreach ( $reviews as $i_review )
        <details>
          <summary>{{ $i_review->recording->title }}</summary>
          <div>
            <p>{{ $i_review->rate }}</p>
            <form action="{{ route('review.delete', ['review' => $i_review]) }}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit">削除</button>
            </form>
          </div>
        </details>
      @endforeach
      {{ $reviews->links() }}
    @endif
  </div>
</x-layout>

