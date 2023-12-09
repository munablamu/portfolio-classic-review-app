<x-layout title='Classic Music Review App'>
  <h1 class="search_h">Search by Artist</h1>

  <div class="mx-3">
    <x-search.bar :q='$q' :oldSearchType=$oldSearchType />
  </div>
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">実際には英語に翻訳された「＊＊＊＊＊＊＊＊＊」で検索されています。</p>
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">検索結果: ****件</p>

  <div class="mx-5 mt-2">
    @if ( $artists->count() === 0 )
      <p>検索したキーワードでは、1件もヒットしませんでした。</p>
    @else
      <ul>
        @foreach ( $artists as $i_artist )
          <li>
            <x-artist.card :artist=$i_artist />
          </li>
        @endforeach
      </ul>

      <div>
        {{ $artists->appends(request()->query())->links() }}
      </div>
    @endif
  </div>
</x-layout>
