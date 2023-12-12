<ul class="overflow-x grid grid-flow-col text-center border-b border-slate-200 text-slate-500 dark:border-slate-600 dark:text-slate-400 mx-5">
  <li class="min-w-[8rem]">
    <a href="{{ route('user.show', ['user' => $user]) }}" class="{{ Request::routeIs('user.show', ['user' => $user]) ? 'text-emerald-600 border-emerald-600 dark:text-emerald-400 dark:border-emerald-400 font-bold' : 'hover:text-emerald-600 dark:hover:text-emerald-400 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">プロフィール</a>
  </li>
  <li class="min-w-[8rem]">
    <a href="{{ route('user.reviews', ['user' => $user]) }}" class="{{ Request::routeIs('user.reviews', ['user' => $user]) ? 'text-emerald-600 border-emerald-600 dark:text-emerald-400 dark:border-emerald-400 font-bold' : 'hover:text-emerald-600 dark:hover:text-emerald-400 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">レビュー</a>
  </li>
  <li class="min-w-[8rem]">
    <a href="{{ route('user.follows', ['user' => $user]) }}" class="{{ Request::routeIs('user.follows', ['user' => $user]) ? 'text-emerald-600 border-emerald-600 dark:text-emerald-400 dark:border-emerald-400 font-bold' : 'hover:text-emerald-600 dark:hover:text-emerald-400 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">フォロー</a>
  </li>
  <li class="min-w-[8rem]">
    <a href="{{ route('user.followers', ['user' => $user]) }}" class="{{ Request::routeIs('user.followers', ['user' => $user]) ? 'text-emerald-600 border-emerald-600 dark:text-emerald-400 dark:border-emerald-400 font-bold' : 'hover:text-emerald-600 dark:hover:text-emerald-400 hover:font-bold border-transparent' }} flex justify-center border-b-4 py-4">フォロワー</a>
  </li>
</ul>
