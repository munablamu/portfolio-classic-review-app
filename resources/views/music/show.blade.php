@php
  $title = $music->composer->name . ', ' . $music->title
@endphp
<x-layout :title=$title>
  <div class="mx-5">
    <div class="relative pt-2 pb-1">
      <h1 class="text-3xl sm:text-6xl font-Ubuntu font-bold tracking-wide text-slate-500 dark:text-slate-400">
        {{ $music->title }}
      </h1>
      <h2 class="text-xl sm:text-5xl font-Ubuntu font-bold tracking-wide ss:text-right ss:-mt-4 sm:-mt-5 text-sage-500">
        {{ $music->composer->name }}
      </h2>
    </div>
    <div class="mt-2 mb-3 text-right">
      <span class="bg-slate-500 text-slate-100 text-sm px-3 py-1 rounded-full">作品番号: {{ $music->opus_string }}</span>
    </div>
  </div>

  <div class="flex justify-end mx-5">
    @php
      $orderBy = request()->query('orderBy', 'release_date');
    @endphp
    <ul class="my-4 py-1 overflow-x flex flex-row ss:justify-end">
      <li class="whitespace-nowrap">
        <a class="order {{ $orderBy === 'release_date' ? 'order-true' : 'order-false' }}"
          href="{{ route('music.show', ['music' => $music, 'orderBy' => 'release_date']) }}">
          <i class="fa-solid fa-calendar-plus mr-1"></i>発売日順
        </a>
      </li>
      <li class="whitespace-nowrap">
        <a class="order {{ $orderBy === 'average_rate' ? 'order-true' : 'order-false' }}"
          href="{{ route('music.show', ['music' => $music, 'orderBy' => 'average_rate']) }}">
          <i class="fa-solid fa-star mr-1"></i>高評価順
        </a>
      </li>
    </ul>
  </div>

  <ul class="mx-5">
    @foreach ( $recordings as $i_recording )
      <li>
        <x-recording.card :recording=$i_recording />
      </li>
    @endforeach
    {{ $recordings->appends(request()->query())->links('vendor.pagination.original') }}
  </ul>
</x-layout>

<x-common.help message="作曲家「{{ $music->composer->name }}」が作曲した「{{ $music->title }}」という曲における、当サイトのデータベース上にある録音(CD, アルバムなど)の一覧です。" />
