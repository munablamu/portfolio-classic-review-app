<x-layout :title="'Search by Artist'">
  <h1 class="search_h mb-4">Search by Artist</h1>

  <x-search.bar :q='$q' :oldSearchType=$oldSearchType />
  @if ( $isTranslated )
    <p class="text-slate-600 dark:text-slate-300 text-sm mx-5 mt-2">実際には英語に翻訳された「<strong>{{ $translatedQ }}</strong>」で検索されています。</p>
  @else
    <p class="text-slate-600 dark:text-slate-300 text-sm mx-5 mt-2">「<strong>{{ $q }}</strong>」は日本語ではないと判定されたためそのまま検索されています。</p>
  @endif
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">検索結果: {{ $artists->total() }}件</p>

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
        {{ $artists->appends(request()->query())->links('vendor.pagination.original') }}
      </div>
    @endif
  </div>
</x-layout>

<x-common.help message="「<strong class='strong-color-invert'>{{ $q }}</strong>」で演奏家を検索した結果です。検索結果からお好きな演奏家を選んでください。" />
