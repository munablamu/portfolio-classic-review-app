<x-layout title='Classic Music Review App'>
  <h1 class="mx-5 pt-2 mb-5 text-3xl sm:text-6xl font-black tracking-wide text-slate-500">{{ $artist->name }}</h1>

  <ul class="mx-5">
    @foreach ( $recordings as $i_recording )
      <li>
        <x-recording.card_in_artist :recording=$i_recording />
      </li>
    @endforeach
    {{ $recordings->links() }}
  </ul>
</x-layout>

