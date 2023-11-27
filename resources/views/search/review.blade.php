<x-layout title='Classic Music Review App'>
  <h1>Search by Review</h1>

  <x-search.bar :q='$q' :oldSearchType=$oldSearchType />

  <div>
    @foreach ( $reviews as $i_review )
      <x-review.card_in_search :review=$i_review />
    @endforeach
    {{ $reviews->links() }}
  </div>
</x-layout>
