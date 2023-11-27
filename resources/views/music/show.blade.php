<x-layout title='Classic Music Review App'>
  <h2 class="text-3xl mb-4">
    作曲家: {{ $music->composer->name }}<br />
    曲名: {{ $music->title }}, {{ $music->opus }}
  </h2>

  <div>
    @foreach ( $recordings as $i_recording )
      <x-recording.card :recording=$i_recording />
      <hr class="border-t border-blue-gray-200 mt-2 mb-2">
    @endforeach
    {{ $recordings->links() }}
  </div>
</x-layout>
