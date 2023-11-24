<header class="text-gray-600 bg-white body-font fixed top-0 w-full z-50">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <!-- logo -->
    <a href="{{ route('top') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">Classic Music Review App</span>
    </a>
    <!-- primary nav -->
    <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
      <a class="mr-5 hover:text-gray-900">First Link</a>
      <a class="mr-5 hover:text-gray-900">Second Link</a>
      <a class="mr-5 hover:text-gray-900">Third Link</a>
      <a class="mr-5 hover:text-gray-900">Fourth Link</a>
    </nav>
    <!-- secondary nav -->
    <div class="hidden md:flex items-center space-x-1">
      @guest
        <a href="{{ route('login') }}" class="inline-flex bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Login</a>
        <a href="{{ route('register') }}" class="inline-flex bg-yellow-400 border-0 py-1 px-3 focus:outline-none hover:bg-yellow-300 rounded text-base mt-4 md:mt-0 text-yellow-900 hover:text-yellow-800 transition duration-300">Signup</a>
      @endguest
      @auth
        <a href="{{ route('home') }}" class="inline-flex bg-green-400 border-0 py-1 px-3 focus:outline-none hover:bg-green-300 rounded text-base mt-4 md:mt-0 text-green-900 hover:text-green-800 transition duration-300">Home</a>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="inline-flex bg-red-400 border-0 py-1 px-3 focus:outline-none hover:bg-red-300 rounded text-base mt-4 md:mt-0 text-red-900 hover:text-red-800 transition duration-300">Logout</a>
        </form>
      @endauth
    </div>
  </div>
</header>
