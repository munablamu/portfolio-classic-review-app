<ul class="grid grid-flow-col text-center border-b border-gray-200 text-gray-500 text-base">
  <li>
    <a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'text-indigo-600 border-indigo-600' : 'hover:text-indigo-600 hover:border-indigo-600 border-transparent' }} flex justify-center border-b-4 py-4">フォローユーザーの新着レビュー</a>
  </li>
  <li>
    <a href="{{ route('home.following_users') }}" class="{{ Request::routeIs('home.following_users') ? 'text-indigo-600 border-indigo-600' : 'hover:text-indigo-600 hover:border-indigo-600 border-transparent' }} flex justify-center border-b-4 py-4">フォローユーザー管理</a>
  </li>
  <li>
    <a href="{{ route('home.reviews') }}" class="{{ Request::routeIs('home.reviews') ? 'text-indigo-600 border-indigo-600' : 'hover:text-indigo-600 hover:border-indigo-600 border-transparent' }} flex justify-center border-b-4 py-4">レビュー管理</a>
  </li>
  <li>
    <a href="{{ route('home.edit_profile') }}" class="{{ Request::routeIs('home.edit_profile') ? 'text-indigo-600 border-indigo-600' : 'hover:text-indigo-600 hover:border-indigo-600 border-transparent' }} flex justify-center border-b-4 py-4">プロフィール管理</a>
  </li>
</ul>
