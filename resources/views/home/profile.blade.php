<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromHomeController=$fromHomeController />

  <x-home.nav_tabs />

  <div class="mx-5">
    <form action="{{ route('profile.update_user_icon') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      <div>
        <label for="user_icon" class="block text-sm font-medium">ユーザーアイコン</label>
        <div class="mt-1 flex rounded-md shadow-sm">
          <input type="file" name="user_icon" id="user_icon" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md">
        </div>
      </div>
      <div class="flex justify-end">
        <button type="submit" class="btn btn-indigo">
          <i class="fa-solid fa-wrench"></i><span class="ml-1">更新</span>
        </button>
      </div>
    </form>
  </div>
  <hr class="border-t border-slate-200 my-4 mx-5">

  <div class="mx-5">
    <form action="{{ route('profile.update_self_introduction') }}" method="post">
      @csrf

      @error('self_introduction')
        <p style="color: red;">{{ $message }}</p>
      @enderror
      <div>
        <label for="self_introduction" class="block text-sm font-medium">自己紹介</label>
        <div class="mt-1">
          <textarea id="self_introduction" name="self_introduction" rows="10" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" placeholder="レビューを書いてください">{{ old('self_introduction', $user->self_introduction) }}</textarea>
        </div>
      </div>

      <div class="flex justify-end mt-6">
        <button type="submit" class="btn btn-indigo">
          <i class="fa-solid fa-wrench"></i><span class="ml-1">更新</span>
        </button>
      </div>
    </form>
  </div>
  <hr class="border-t border-slate-200 my-4 mx-5">

  <div class="mx-5 mb-5">
    @include('profile.partials.update-profile-information-form')
    <hr class="border-t border-blue-slate-200 my-4">

    @include('profile.partials.update-password-form')
    <hr class="border-t border-blue-slate-200 my-4">

    @include('profile.partials.delete-user-form')
  </div>
</x-layout>
