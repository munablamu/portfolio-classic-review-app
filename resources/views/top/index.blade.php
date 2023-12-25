<x-layout>
  <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-screen h-screen z-0">
    <img class="object-cover min-h-full min-w-full" src="{{ top_background_url() }}">
  </div>
  <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full sm:w-auto">
    <x-search.bar :q=null :oldSearchType=null :fromTopController=$fromTopController />
  </div>
</x-layout>

<x-common.help message="「<strong class='strong-color-invert'>Classic Music Review App</strong>」へようこそ。まずは、検索バーのプルダウンメニューから「<strong class='strong-color-invert'>Music Title</strong>」を選んで、「<strong class='strong-color-invert'>バッハ</strong>」を検索してみてください。" />
