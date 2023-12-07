<div class="my-2">
  <a href="{{ route('music.show', ['music' => $music]) }}" class="url text-xl">
    {!! $music->title !!}
  </a>
  <p class="text-slate-700 dark:text-slate-300">作曲家: {!! $music->composer->name !!}</p>
  <hr class="border-t border-slate-200 dark:border-slate-600 mt-2 mb-2">
</div>
