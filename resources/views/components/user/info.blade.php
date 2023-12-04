<div class="flex mx-5 my-2 pt-2">
  <div>
    <img src="{{ user_icon_url($user->icon_filename) }}" alt="{{ $user->name }}" width="100" class="w-24 h-24 rounded-full">
  </div>
  <div class="ml-2 my-2">
    <h2 class="text-3xl font-bold">{{ $user->name }}</h2>
    <p class="">レビュー: {{ $reviewCount }}件 (評価: {{ $allReviewCount }}件)</p>
    <p class="text-pink-400"><i class="far fa-heart like-btn mr-1"></i>{{ $likeSum }}</p>
  </div>
</div>
