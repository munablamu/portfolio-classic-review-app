<div>
  <div class="flex justify-between items-center">
    <div class="flex items-center my-2">
      <div class="mr-4 flex-shrink-0">
        <a href="{{ route('user.show', ['user' => $user]) }}">
          <img src="{{ user_icon_url($user->icon_filename) }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full object-cover">
        </a>
      </div>
      <div class="flex flex-col">
        <a href="{{ route('user.show', ['user' => $user]) }}">
          <p class="underline">{{ $user->name }}</p>
        </a>
        <p class="text-sm text-slate-400 dark:text-slate-400 sm:line-clamp-1 line-clamp-2">
          {{ $user->self_introduction }}
        </p>
      </div>
    </div>
    @if ( Str::startsWith(Request::path(), 'home') )
      <div class="flex-shrink-0">
        <form action="{{ route('follow.destroy', ['user' => $user]) }}" method="post">
          @csrf
          <button type="submit" class="btn btn-rose">解除する</button>
        </form>
      </div>
    @endif
  </div>
  <hr class="border-t item-border-color">
</div>
