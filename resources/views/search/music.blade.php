<x-layout title='Classic Music Review App'>
  <h1 class="text-3xl font-bold">曲名検索</h1>

  <x-search.bar :q='$q' :oldSearchType=$oldSearchType />

    @foreach ( $musics as $i_music )
      <x-music.card :music=$i_music />
      <hr class="border-t border-blue-gray-200 mt-2 mb-2">
    @endforeach
  {{ $musics->links() }}
</x-layout>
