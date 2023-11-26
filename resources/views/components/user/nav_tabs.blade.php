<ul class="grid grid-flow-col text-center border-b border-gray-200 text-gray-500 text-base">
  <li>
    <a href="{{ route('user.show', ['user' => $user]) }}" class="{{ Request::routeIs('user.show', ['user' => $user]) ? 'text-green-600 border-green-600' : 'hover:text-green-600 hover:border-green-600 border-transparent' }} flex justify-center border-b-4 py-4">プロフィール</a>
  </li>
  <li>
    <a href="{{ route('user.reviews', ['user' => $user]) }}" class="{{ Request::routeIs('user.reviews', ['user' => $user]) ? 'text-green-600 border-green-600' : 'hover:text-green-600 hover:border-green-600 border-transparent' }} flex justify-center border-b-4 py-4">レビュー一覧</a>
  </li>
</ul>
