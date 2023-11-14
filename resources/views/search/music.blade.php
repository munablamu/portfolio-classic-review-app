<x-layout title='Classic Music Review App'>
  <h1>Search by Music</h1>

  <x-search.form :q='$q' />

  <x-music.list :musics='$musics' />
  {{ $musics->links() }}
</x-layout>
