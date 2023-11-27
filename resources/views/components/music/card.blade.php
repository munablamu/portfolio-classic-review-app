<div class="mt-2 mb-2">
  <a href="{{ route('music.show', ['music' => $music]) }}" class="text-xl">
    {!! $music->title !!}
  </a>
  <p>作曲家: {!! $music->composer->name !!}
</div>
