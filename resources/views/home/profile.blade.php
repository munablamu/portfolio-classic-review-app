<x-layout title='Classic Music Review App'>
  <h1>Home Profile</h1>

  <h2>{{ $user->name }}</h2>
  <!-- TODO 画像が存在しない倍の処理 -->
  <img src="{{ asset('storage/user_icons/' . $user->icon_filename) }}" alt="" width="100">
  <p>レビュー件数: {{ $reviewCount }}件 (評価件数: {{ $allReviewCount }}件)</p>
  <p>レビューについたいいね総数: {{ $likeSum }}</p>

  <div>
    <a href="{{ route('home') }}">フォロー中のユーザーの新着レビュー</a>
    <a href="{{ route('home.following_users') }}">フォローユーザー管理</a>
    <a href="{{ route('home.reviews') }}">レビュー管理</a>
    <a href="{{ route('home.edit_profile') }}">プロフィール管理</a>
  </div>

  <div>
    <form action="" method="post">
      @error('self_introduction')
        <p style="color: red;">{{ $message }}</p>
      @enderror
      <label for="self_introduction">自己紹介</label>
      <textarea id="self_introduction" name="self_introduction" rows="5" cols="80" placeholder="レビューを書いてください">{{ old('self_introduction', $user->self_introduction) }}</textarea>
      <br />

      <button type="submit">プロフィールを更新する(TODO: 未実装)</button>
    </form>
  </div>
</x-layout>
