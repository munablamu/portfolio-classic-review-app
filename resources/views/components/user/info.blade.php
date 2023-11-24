<div class="flex">
  <div>
    <img src="{{ user_icon_url($user->icon_filename) }}" alt="{{ $user->name }}" width="100" class="w-24 h-24 rounded-full">
  </div>
  <div>
    <h2 class="text-3xl">{{ $user->name }}</h2>
    <p class="text-base">レビュー: {{ $reviewCount }}件 (評価: {{ $allReviewCount }}件)</p>
    <p class="text-base">いいね: {{ $likeSum }}</p>
  </div>
</div>
