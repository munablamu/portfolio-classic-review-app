<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <x-home.nav_tabs />

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
