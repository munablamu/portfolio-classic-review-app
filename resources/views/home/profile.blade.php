<x-layout title='Classic Music Review App'>
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum />

  <x-home.nav_tabs />

  <div>
    <form action="{{ route('profile.update_user_icon') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <div>
        <label for="user_icon" class="block text-sm font-medium text-gray-700">ユーザーアイコン</label>
        <div class="mt-1 flex rounded-md shadow-sm">
          <input type="file" name="user_icon" id="user_icon" class="focus:ring-indigo-500 focus:border-indigo-500 flex-grow sm:text-sm border-gray-300 rounded-l-md">
        </div>
      </div>
      <div class="flex justify-end">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          更新
        </button>
      </div>
    </form>
  </div>
  <hr class="border-t border-blue-gray-200 mt-2 mb-2">

  <div>
    <form action="{{ route('profile.update_self_introduction') }}" method="post">
      @csrf

      @error('self_introduction')
        <p style="color: red;">{{ $message }}</p>
      @enderror
      <div>
        <label for="self_introduction" class="block text-sm font-medium text-gray-700">自己紹介</label>
        <div class="mt-1">
          <textarea id="self_introduction" name="self_introduction" rows="10" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="レビューを書いてください">{{ old('self_introduction', $user->self_introduction) }}</textarea>
        </div>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          更新
        </button>
      </div>
    </form>
  </div>
  <hr class="border-t border-blue-gray-200 mt-2 mb-2">

  @include('profile.partials.update-profile-information-form')
  <hr class="border-t border-blue-gray-200 mt-2 mb-2">

  @include('profile.partials.update-password-form')
  <hr class="border-t border-blue-gray-200 mt-2 mb-2">

  @include('profile.partials.delete-user-form')
</x-layout>
