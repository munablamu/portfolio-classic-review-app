<x-layout :title="'Search by Review'">
  <h1 class="search_h">Search by Review</h1>

  <div class="mx-3">
    <x-search.bar :q='$q' :oldSearchType=$oldSearchType />
  </div>

  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">検索結果: {{ $reviews->total() }}件</p>

  <div class="mt-2">
    @if ( $reviews->count() === 0 )
    <p class="mx-5">検索したキーワードでは、1件もヒットしませんでした。</p>
    @else
      <ul>
        @foreach ( $reviews as $i_review )
          <li>
            <x-review.card_in_search :review=$i_review />
          </li>
        @endforeach
      </ul>
      <div class="mx-5">
        {{ $reviews->appends(request()->query())->links('vendor.pagination.original') }}
      </div>
    @endif
  </div>
</x-layout>
