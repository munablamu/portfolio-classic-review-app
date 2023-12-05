<div>
  <div class="flex justify-between items-center">
    <div class="flex items-center my-2">
      <div class="mr-4">
        <a href="{{ route('user.show', ['user' => $user]) }}">
          <img src="{{ user_icon_url($user->icon_filename) }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full">
        </a>
      </div>
      <div>
        <a href="{{ route('user.show', ['user' => $user]) }}">
          <p class="underline">{{ $user->name }}</p>
        </a>
      </div>
    </div>
    <form action="{{ route('follow.destroy', ['user' => $user]) }}" method="post">
      @csrf
      <button type="submit" class="btn btn-rose">解除する</button>
    </form>
  </div>
  <hr class="border-t border-slate-200">
</div>
