<x-layout title='Classic Music Review App'>
  <h1 class="text-3xl font-bold">演奏家検索</h1>

  <x-search.bar :q='$q' :oldSearchType=$oldSearchType />

  <div>
    @foreach ( $artists as $i_artist )
      <x-artist.card :artist=$i_artist />
      <hr class="border-t border-blue-gray-200 mt-2 mb-2">
    @endforeach
    {{ $artists->links() }}
  </div>
</x-layout>
