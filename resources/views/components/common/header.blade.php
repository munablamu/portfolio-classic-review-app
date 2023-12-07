<header class="text-slate-300 bg-slate-800 body-font fixed top-0 w-full z-10">
  <div class="container mx-auto flex flex-wrap px-5 py-3 flex-row items-center justify-between">
    <!-- logo -->
    <a href="{{ route('top') }}" class="flex title-font font-medium items-center text-slate-100">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-8 h-8 sm:w-10 sm:h-10 text-slate-100 p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl font-bold">Classic Music Review App</span>
    </a>
    <!-- primary nav -->
    <nav class="hidden md:ml-auto md:mr-auto md:flex md:flex-wrap items-center text-base justify-center">
      <a href="#" class="mr-5 hover:text-slate-100">このサイトの使い方</a>
    </nav>
    <!-- secondary nav -->
    <div class="hidden md:flex items-center space-x-1">
      <button id="theme-toggle">ダークモード切り替え</button>
      @guest
        <a href="{{ route('login') }}" class="btn btn-black md:m-0">Login</a>
        <a href="{{ route('register') }}" class="btn btn-yellow md:m-0">Signup</a>
      @endguest
      @auth
        <!-- TODO: tabキーでhomeだけフォーカスできない -->
        <a href="{{ route('home') }}" class="btn btn-black md:m-0">Home</a>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-pink md:m-0">Logout</a>
        </form>
      @endauth
    </div>
    <!-- hamburger button -->
    <div id="hamburger" class="md:hidden">
      <button type="button" class="block text-slate-400 hover:text-slate-300 focus:text-slate-200 focus:outline-none">
        <svg class="h-8 w-8 fill-current" viewBox="0 0 24 24">
          <path id="open" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
          <path id="close" class="hidden" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
        </svg>
      </button>
    </div>
  </div>
  <div id="hamburger_nav" class="hidden md:hidden text-right mx-auto px-5">
    <nav class="px-2 pt-2 pb-4 flex flex-col p-0">
      <a href="#" class="block px-2 py-1 rounded-md hover:text-slate-100 hover:bg-slate-600 focus:bg-slate-500">このサイトの使い方</a>
      @guest
        <a href="{{ route('login') }}" class="block px-2 py-1 rounded-md hover:text-slate-100 hover:bg-slate-600 focus:bg-slate-500">Login</a>
        <a href="{{ route('register') }}" class="block px-2 py-1 rounded-md text-yellow-500 hover:text-yellow-400 focus:text-yellow-300 hover:bg-slate-600 focus:bg-slate-500">Signup</a>
      @endguest
      @auth
        <a href="{{ route('home') }}" class="block px-2 py-1 rounded-md hover:text-slate-100 hover:bg-slate-600 focus:bg-slate-500">Home</a>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="w-full text-right block px-2 py-1 rounded-md text-pink-500 hover:text-pink-400 focus:text-pink-300 hover:bg-slate-600 focus:bg-slate-500">Logout</a>
        </form>
      @endauth
    </nav>
  </div>

  <script>
    // hamburger
    document.getElementById('hamburger').addEventListener('click', function() {
      var open = document.getElementById('open');
      var close = document.getElementById('close');
      var hamburger_nav = document.getElementById('hamburger_nav');
      open.classList.toggle('hidden');
      close.classList.toggle('hidden');
      hamburger_nav.classList.toggle('hidden');
    });


    // dark mode toggle
    var themeToggleBtn = document.getElementById('theme-toggle');
    themeToggleBtn.addEventListener('click', function() {
      if (document.documentElement.classList.contains('dark')) {
          document.documentElement.classList.remove('dark');
          localStorage.setItem('color-theme', 'light');
      } else {
          document.documentElement.classList.add('dark');
          localStorage.setItem('color-theme', 'dark');
      }
    });

    window.addEventListener('DOMContentLoaded', (event) => {
      const storedTheme = localStorage.getItem('color-theme');
      if (storedTheme) {
          document.documentElement.classList.add(storedTheme);
      } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
          document.documentElement.classList.add('dark');
      }
    });
  </script>
</header>
