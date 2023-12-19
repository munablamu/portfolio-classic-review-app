<x-layout :title="'Search by Review'">
  <h1 class="search_h mb-4">Search by Review</h1>

  <x-search.bar :q='$q' :oldSearchType=$oldSearchType />

  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5 mt-2">検索結果: {{ $reviews->total() }}件</p>

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

<x-common.help message="「<strong class='strong-color-invert'>{{ $q }}</strong>」でレビューを全文検索した結果です。ユーザー名からユーザーページ、録音（CDやアルバム）タイトル・ジャケット画像から録音詳細ページ、レビュータイトル(続きを読む)からレビューの全文を閲覧できるページに移動できます。" />
