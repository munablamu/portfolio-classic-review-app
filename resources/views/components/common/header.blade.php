<header class="text-slate-300 bg-black body-font fixed top-0 w-full z-10">
  <div class="flex flex-wrap px-5 py-3 flex-row items-center justify-between">
    <!-- logo -->
    <a href="{{ route('top') }}" class="flex title-font font-medium items-center text-slate-100">
      <div class="w-8 h-8 sm:w-10 sm:h-10 text-base sm:text-xl flex justify-center items-center">
        <img src="{{ logo_url('png') }}">
      </div>
      <span class="ml-3 text-lg sm:text-xl font-bold font-Lobster sm:tracking-widest tracking-tighter">Classic Music Review App</span>
    </a>
    <!-- primary nav -->
    <nav class="hidden md:ml-auto md:mr-auto md:flex md:flex-wrap items-center text-base justify-center">
      <a href="{{ route('help') }}" class="mr-5 hover:text-slate-100">
        <i class="fa-solid fa-seedling"></i><span class="ml-1">ご採用担当者さまへ</span>
      </a>
    </nav>


    <!-- secondary nav -->
    <div class="items-center space-x-1 flex flex-row">
      <!-- light / dark theme toggle button -->
      <button id="theme-toggle" aria-label="Toggle theme" class="btn btn-black h-8 w-8 rounded-lg border-2 border-slate-300">
        <span class="w-full h-full flex items-center justify-center text-2xl" id="dark-icon">
          <i class="fa-solid fa-moon"></i>
        </span>
        <span class="w-full h-full flex items-center justify-center text-2xl hidden" id="light-icon">
          <i class="fa-solid fa-sun"></i>
        </span>
      </button>

      <div class="hidden md:flex">
        @guest
          <a href="{{ route('login') }}" class="btn btn-black md:m-0 md:mr-2">Login</a>
          <a href="{{ route('register') }}" class="btn btn-yellow md:m-0">Signup</a>
        @endguest
        @auth
          <!-- TODO: tabキーでhomeだけフォーカスできない -->
          <a href="{{ route('home') }}" class="btn btn-black md:m-0 md:mr-2">Home</a>
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-pink md:m-0">Logout</button>
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
  </div>
  <div id="hamburger_nav" class="hidden md:hidden text-right mx-auto px-5">
    <nav class="px-2 pt-2 pb-4 flex flex-col p-0">
      <a href="{{ route('help') }}" class="block px-2 py-1 rounded-md hover:text-slate-100 hover:bg-slate-600 focus:bg-slate-500">
        <i class="fa-solid fa-seedling"></i><span class="ml-1">ご採用担当者さまへ</span>
      </a>
      @guest
        <a href="{{ route('login') }}" class="block px-2 py-1 rounded-md hover:text-slate-100 hover:bg-slate-600 focus:bg-slate-500">Login</a>
        <a href="{{ route('register') }}" class="block px-2 py-1 rounded-md text-yellow-500 hover:text-yellow-400 focus:text-yellow-300 hover:bg-slate-600 focus:bg-slate-500">Signup</a>
      @endguest
      @auth
        <a href="{{ route('home') }}" class="block px-2 py-1 rounded-md hover:text-slate-100 hover:bg-slate-600 focus:bg-slate-500">Home</a>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="w-full text-right block px-2 py-1 rounded-md text-pink-500 hover:text-pink-400 focus:text-pink-300 hover:bg-slate-600 focus:bg-slate-500">Logout</button>
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
    document.addEventListener('DOMContentLoaded', (event) => {
      const themeToggle = document.getElementById('theme-toggle');
      const darkIcon = document.getElementById('dark-icon');
      const lightIcon = document.getElementById('light-icon');

      // 初期テーマの設定
      const theme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light");
      document.documentElement.classList.add(theme);
      if (theme === 'dark') {
        darkIcon.classList.add('hidden');
        lightIcon.classList.remove('hidden');
      } else {
        darkIcon.classList.remove('hidden');
        lightIcon.classList.add('hidden');
      }

      // サーバー:light、ブラウザ:darkだと、<html class="light dark">になってしまう。この場合、ページ遷移時に画面がちらつくので、ブラウザ側のテーマをサーバー側に送信する。
      const serverTheme = document.documentElement.classList.contains('light dark') ? 'dark' : 'light';
      if (theme !== serverTheme) {
        // テーマが一致しない場合、サーバーにテーマを送信
        fetch('/set-theme', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
            theme: theme
          })
        });
      }

      // テーマ切り替えボタンのクリックイベント
      themeToggle.addEventListener('click', () => {
        if (document.documentElement.classList.contains('dark')) {
          document.documentElement.className = 'light';
          localStorage.setItem('theme', 'light');
          darkIcon.classList.remove('hidden');
          lightIcon.classList.add('hidden');
        } else {
          document.documentElement.className = 'dark';
          localStorage.setItem('theme', 'dark');
          darkIcon.classList.add('hidden');
          lightIcon.classList.remove('hidden');
        }

        // サーバーにテーマを送信
        fetch('/set-theme', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
            theme: localStorage.getItem('theme')
          })
        });
      });
    });
  </script>
</header>
