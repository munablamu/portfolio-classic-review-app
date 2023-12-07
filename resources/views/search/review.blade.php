<x-layout title='Classic Music Review App'>
  <h1 class="search_h">Search by Review</h1>

  <div class="mx-3">
    <x-search.bar :q='$q' :oldSearchType=$oldSearchType />
  </div>

  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5 mb-5">検索結果: ****件</p>

  <ul>
    @foreach ( $reviews as $i_review )
      <li>
        <x-review.card_in_search :review=$i_review />
      </li>
    @endforeach
  </ul>
  {{ $reviews->links() }}
</x-layout>
