<x-layout :title="'Home'">
  <x-user.info :user=$user :reviewCount=$reviewCount :allReviewCount=$allReviewCount :likeSum=$likeSum :fromHomeController=$fromHomeController />

  <x-home.nav_tabs />

  <div class="mx-5">
    <form action="{{ route('profile.update_user_icon') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @method("PUT")
      @csrf
      <div class="w-full">
        <p class="inline-block text-sm font-medium mb-1">ユーザーアイコン</label>
        @error('user_icon')
          <span class="validate ml-4">{{ $message }}</span>
        @enderror
        <div class="flex items-center">
          <label for="user_icon" class="flex flex-shrink-0 px-2 items-center h-8 bg-slate-700 hover:bg-slate-500 text-slate-200 hover:text-slate-50 active:bg-slate-800 dark:bg-slate-200 dark:hover:bg-slate-150 dark:text-slate-800 dark:active:bg-slate-300 rounded-md shadow tracking-wide uppercase cursor-pointer">
            <span class="leading-normal">ファイルを選択</span>
            <input type='file' class="hidden" name="user_icon" id="user_icon" onchange="showFileName()" />
          </label>
          <span id="file-name" class="flex items-center w-full px-2 h-8 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md ml-1">選択されていません</span>
        </div>
      </div>
      <div class="flex justify-end">
        <button type="submit" class="btn btn-indigo">
          <i class="fa-solid fa-wrench"></i><span class="ml-1">更新</span>
        </button>
      </div>
    </form>
  </div>
  <hr class="border-t border-slate-200 dark:border-slate-600 my-4 mx-5">

  <div class="mx-5">
    <form action="{{ route('profile.update_self_introduction') }}" method="post">
      @method("PUT")
      @csrf

      @error('self_introduction')
        <p style="color: red;">{{ $message }}</p>
      @enderror
      <div>
        <label for="self_introduction" class="block text-sm font-medium">自己紹介</label>
        <div class="mt-1">
          <textarea id="self_introduction" name="self_introduction" rows="10" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md" placeholder="自己紹介文を書いてください">{{ old('self_introduction', $user->self_introduction) }}</textarea>
        </div>
      </div>

      <div class="flex justify-end mt-6">
        <button type="submit" class="btn btn-indigo">
          <i class="fa-solid fa-wrench"></i><span class="ml-1">更新</span>
        </button>
      </div>
    </form>
  </div>
  <hr class="border-t border-slate-200 dark:border-slate-600 my-4 mx-5">

  <div class="mx-5 mb-5">
    @include('profile.partials.update-profile-information-form')
    <hr class="border-t border-blue-slate-200 dark:border-slate-600 my-4">

    @include('profile.partials.update-password-form')
    <hr class="border-t border-blue-slate-200 dark:border-slate-600 my-4">

    @include('profile.partials.delete-user-form')
  </div>
</x-layout>


<script>
  function showFileName() {
    var input = document.getElementById('user_icon');
    var infoArea = document.getElementById('file-name');

    // get the file name
    var inputFileName = input.files[0].name;

    // display the file name
    infoArea.textContent = inputFileName;
  }
</script>
