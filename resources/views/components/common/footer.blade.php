<footer class="text-slate-300 bg-slate-800 body-font z-10">
  <div class="container px-5 py-1 mx-auto flex items-center sm:flex-row flex-col">
    <p class="text-sm sm:py-2 sm:mt-0 mt-2">© 2023 munablemu —
      <a href="https://github.com/munablamu/portfolio-classic-review-app" class="text-slate-400 underline ml-1" rel="noopener noreferrer" target="_blank">
      <i class="fa-brands fa-github mr-1"></i>github
      </a>
    </p>
    <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
      <!-- Facebook -->
      <a class="text-slate-400 hover:text-slate-300">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
        </svg>
      </a>
      <!-- Twitter -->
      <a id="twitter" class="ml-3 text-slate-400 hover:text-slate-300">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
        </svg>
      </a>
      <!-- Instagram -->
      <a class="ml-3 text-slate-400 hover:text-slate-300">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
          <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
        </svg>
      </a>
      <!-- Linkedin -->
      <a id="linkedin" class="ml-3 text-slate-400 hover:text-slate-300">
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

    const twitter = document.getElementById('twitter');
    twitter.setAttribute("href", `https://twitter.com/intent/tweet?text=${pageTitle}&url=${currentUrl}&hashtags=ClassicMusicReviewApp`);

    const linkedin = document.getElementById('linkedin');
    linkedin.setAttribute("href", `https://www.linkedin.com/sharing/share-offsite/?url=${currentUrl}`)
  </script>
  <!-- twitter -->
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  <!-- linkedin -->
  <script src="https://platform.linkedin.com/in.js" type="text/javascript"></script>
  <script type="IN/Share" data-url="https://cly7796.net/blog/sample/set-up-a-linkedin-share-button/"></script>
</footer>
