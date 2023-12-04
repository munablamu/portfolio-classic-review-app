<ul class="nav_tabs grid grid-flow-col text-center border-b border-slate-200 text-slate-500 mx-5">
  <li class="min-w-[8rem]">
    <a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'text-indigo-600 border-indigo-600 font-bold' : 'hover:text-indigo-600 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">タイムライン</a>
  </li>
  <li class="min-w-[8rem]">
    <a href="{{ route('home.following_users') }}" class="{{ Request::routeIs('home.following_users') ? 'text-indigo-600 border-indigo-600 font-bold' : 'hover:text-indigo-600 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">フォローユーザー</a>
  </li>
  <li class="min-w-[8rem]">
    <a href="{{ route('home.reviews') }}" class="{{ Request::routeIs('home.reviews') ? 'text-indigo-600 border-indigo-600 font-bold' : 'hover:text-indigo-600 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">レビュー管理</a>
  </li>
  <li class="min-w-[8rem]">
    <a href="{{ route('home.edit_profile') }}" class="{{ Request::routeIs('home.edit_profile') ? 'text-indigo-600 border-indigo-600 font-bold' : 'hover:text-indigo-600 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">プロフィール管理</a>
  </li>
</ul>
