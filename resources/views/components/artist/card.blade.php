<div class="my-2">
  <a href="{{ route('artist.show', ['artist' => $artist]) }}" class="url text-xl">
    {!! $artist->name !!}
  </a>
  <hr class="border-t border-slate-200 dark:border-slate-600 mt-2 mb-2">
</div>
