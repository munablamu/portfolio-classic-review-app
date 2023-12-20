<x-layout :title="'Search by Title'">
  <h1 class="search_h mb-4">Search by Title</h1>

  <x-search.bar :q='$q' :oldSearchType=$oldSearchType />
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5 mt-2">実際には英語に翻訳された「＊＊＊＊＊＊＊＊＊」で検索されています。</p>
  <p class="text-slate-600 dark:text-slate-300 text-sm mx-5">検索結果: {{ $musics->total() }}件</p>

  <div class="mx-5 mt-2">
    @if ( $musics->count() === 0 )
      <p>検索したキーワードでは1件もヒットしませんでした。</p>
    @else
      <ul>
        @foreach ( $musics as $i_music )
        <li>
          <x-music.card :music=$i_music />
        </li>
        @endforeach
      </ul>

      <div>
        {{ $musics->appends(request()->query())->links('vendor.pagination.original') }}
      </div>
    @endif
  </div>
</x-layout>

@if ( $q === 'バッハ' )
  <x-common.help message="「<strong class='strong-color-invert'>{{ $q }}</strong>」で曲名検索した結果です。検索結果からお好きな曲を選んでください。データベース上には曲名、作曲家名、演奏家名などがすべて英語やドイツ語で登録されています。そのため、曲名や演奏家名で検索するとDeepLのAPIで翻訳された英語で検索されるようになっています。今回は「バッハ」で検索したので、ピアノ曲の「<strong class='strong-color-invert'>Goldberg Variations</strong>（ゴルドベルグ変奏曲）」を選んでみてください。" />
@else
  <x-common.help message="「<strong class='strong-color-invert'>{{ $q }}</strong>」で曲名検索した結果です。検索結果からお好きな曲を選んでください。" />
@endif
