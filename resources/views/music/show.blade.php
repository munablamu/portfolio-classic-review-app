<x-layout title='Classic Music Review App'>
  <div class="mx-5">
    <div class="relative pt-2 pb-1">
      <h1 class="text-3xl sm:text-6xl font-black tracking-wide text-slate-500">
        {{ $music->title }}
      </h1>
      <h2 class="text-xl sm:text-5xl font-bold tracking-wide text-right -mt-4 sm:-mt-5 text-sage-500">
        {{ $music->composer->name }}
      </h2>
    </div>
    <div class="mb-3 text-right">
      <span class="bg-slate-500 text-slate-100 text-sm px-3 py-1 rounded-full">作品番号: {{ $music->opus_string }}</span>
    </div>
  </div>

  <ul class="mx-5">
    @foreach ( $recordings as $i_recording )
      <li>
        <x-recording.card :recording=$i_recording />
      </li>
    @endforeach
    {{ $recordings->links() }}
  </ul>
</x-layout>
