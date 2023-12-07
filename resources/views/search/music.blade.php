<x-layout title='Classic Music Review App'>
  <h1 class="search_h">music title search</h1>

  <div class="mx-3">
    <x-search.bar :q='$q' :oldSearchType=$oldSearchType />
  </div>
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">実際には英語に翻訳された「＊＊＊＊＊＊＊＊＊」で検索されています。</p>
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">検索結果: ****件</p>

  <ul class="mx-5">
    @foreach ( $musics as $i_music )
    <li>
      <x-music.card :music=$i_music />
    </li>
    @endforeach
  </ul>

  <div class="mx-5">
    {{ $musics->links() }}
  </div>
</x-layout>
