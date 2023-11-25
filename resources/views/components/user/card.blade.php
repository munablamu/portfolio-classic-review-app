<a href="{{ route('user.show', ['user' => $user]) }}">
  <div class="flex items-center mt-2 mb-2">
    <div class="mr-4">
      <img src="{{ user_icon_url($user->icon_filename) }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full">
    </div>
    <div>
      <p class="text-base">{{ $user->name }}</p>
    </div>
  </div>
</a>
