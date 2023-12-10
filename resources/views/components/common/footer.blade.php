<footer class="text-slate-300 bg-slate-800 body-font z-10">
  <div class="container px-5 py-1 mx-auto flex items-center sm:flex-row flex-col">
    <p class="text-sm sm:py-2 sm:mt-0 mt-2">© 2023 munablemu —
      <a href="https://github.com/munablamu/portfolio-classic-review-app" class="text-slate-400 underline ml-1" rel="noopener noreferrer" target="_blank">
      <i class="fa-brands fa-github mr-1"></i>github
      </a>
    </p>
    <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
      <!-- Facebook -->
      <a id="facebook" class="text-slate-400 hover:text-slate-300" rel="nofollow noopener" target="_blank">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
        </svg>
      </a>
      <!-- Twitter -->
      <a id="twitter" class="ml-3 text-slate-400 hover:text-slate-300" rel="nofollow noopener" target="_blank">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
        </svg>
      </a>
      <!-- hatena -->
      <a id="hatena" class="ml-3 text-slate-400 hover:text-slate-300" rel="nofollow noopener" target="_blank">
        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 50 50">
          <path d="M 9 4 C 6.24 4 4 6.24 4 9 L 4 41 C 4 43.76 6.24 46 9 46 L 41 46 C 43.76 46 46 43.76 46 41 L 46 9 C 46 6.24 43.76 4 41 4 L 9 4 z M 14.939453 16 L 23.470703 16 C 26.070703 16 28.169922 17.890469 28.169922 20.230469 C 28.169922 22.130469 26.759844 23.72 24.839844 24.25 C 27.199844 24.65 29 26.659844 29 29.089844 C 29 31.799844 26.750469 34 23.980469 34 L 14.939453 34 L 14.939453 16 z M 30.939453 16 L 35 16 L 35 28 L 30.939453 28 L 30.939453 16 z M 19.210938 19.949219 L 19.210938 23.599609 L 21.619141 23.599609 C 22.659141 23.599609 23.509766 22.779766 23.509766 21.759766 C 23.509766 20.819766 22.770312 20.049219 21.820312 19.949219 L 19.210938 19.949219 z M 19.210938 26.800781 L 19.210938 30.810547 L 22.210938 30.810547 C 23.350938 30.810547 24.269531 29.910547 24.269531 28.810547 C 24.269531 27.700547 23.350938 26.800781 22.210938 26.800781 L 19.210938 26.800781 z M 32.970703 30 C 34.090703 30 35 30.9 35 32 C 35 33.1 34.090703 34 32.970703 34 C 31.850703 34 30.939453 33.1 30.939453 32 C 30.939453 30.9 31.850703 30 32.970703 30 z"></path>
        </svg>
      </a>
      <!-- Linkedin -->
      <a id="linkedin" class="ml-3 text-slate-400 hover:text-slate-300" rel="nofollow noopener" target="_blank">
        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
          <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
          <circle cx="4" cy="4" r="2" stroke="none"></circle>
        </svg>
      </a>
    </span>
  </div>

  <script>
    const currentUrl = window.location.href;
    const pageTitle = document.title;

    const facebook = document.getElementById('facebook');
    facebook.setAttribute("href", `http://www.facebook.com/share.php?u=${currentUrl}`);

    const twitter = document.getElementById('twitter');
    twitter.setAttribute("href", `https://twitter.com/intent/tweet?text=${pageTitle}&url=${currentUrl}&hashtags=ClassicMusicReviewApp`);

    const hatena = document.getElementById('hatena');
    hatena.setAttribute("href", `http://b.hatena.ne.jp/add?mode=confirm&url=${currentUrl}`);

    const linkedin = document.getElementById('linkedin');
    linkedin.setAttribute("href", `https://www.linkedin.com/sharing/share-offsite/?url=${currentUrl}`)
  </script>
  <!-- twitter -->
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  <!-- linkedin -->
  <script src="https://platform.linkedin.com/in.js" type="text/javascript"></script>
  <script type="IN/Share" data-url="https://cly7796.net/blog/sample/set-up-a-linkedin-share-button/"></script>
</footer>
