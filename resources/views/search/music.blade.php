<x-layout title='Classic Music Review App'>
  <h1>Search by Music</h1>

  <x-search.bar :q='$q' :oldSearchType=$oldSearchType />

  <x-music.list :musics='$musics' />
  {{ $musics->links() }}
</x-layout>
