<ul class="overflow-x grid grid-flow-col text-center border-b border-slate-200 text-slate-500 mx-5">
  <li class="min-w-[8rem]">
    <a href="{{ route('user.show', ['user' => $user]) }}" class="{{ Request::routeIs('user.show', ['user' => $user]) ? 'text-emerald-600 border-emerald-600 font-bold' : 'hover:text-emerald-600 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">プロフィール</a>
  </li>
  <li class="min-w-[8rem]">
    <a href="{{ route('user.reviews', ['user' => $user]) }}" class="{{ Request::routeIs('user.reviews', ['user' => $user]) ? 'text-emerald-600 border-emerald-600 font-bold' : 'hover:text-emerald-600 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">レビュー</a>
  </li>
</ul>
