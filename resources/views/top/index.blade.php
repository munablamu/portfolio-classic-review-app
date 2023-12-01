<x-layout title='Classic Music Review App'>
  <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-top-background bg-cover bg-center w-screen h-screen z-0">
  </div>
  <div class="hidden sm:block absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
    <x-search.bar :q=null :oldSearchType=null />
  </div>
  <div class="sm:hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full">
    <x-search.bar :q=null :oldSearchType=null />
  </div>
</x-layout>
