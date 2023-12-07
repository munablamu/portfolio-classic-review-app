<x-layout title='Classic Music Review App'>
  <h1 class="search_h">artist search</h1>

  <div class="mx-3">
    <x-search.bar :q='$q' :oldSearchType=$oldSearchType />
  </div>
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">実際には英語に翻訳された「＊＊＊＊＊＊＊＊＊」で検索されています。</p>
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">検索結果: ****件</p>

  <ul class="mx-5">
    @foreach ( $artists as $i_artist )
      <li>
        <x-artist.card :artist=$i_artist />
      </li>
    @endforeach
  </ul>

  <div class="mx-5">
    {{ $artists->links() }}
  </div>
</x-layout>
