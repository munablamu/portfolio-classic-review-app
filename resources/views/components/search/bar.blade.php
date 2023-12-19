<form action="{{ route('search.index') }}" method="get" class="mx-5">
  <div class="flex flex-col sm:flex-row items-center">
    <select name="search_type" class="w-full sm:w-auto rounded-md sm:rounded-r-none h-10 capitalize pl-4 pr-8 border-slate-300 text-slate-600 bg-slate-100 hover:border-slate-400 dark:border-slate-500 dark:text-slate-125 dark:bg-slate-600 dark:hover:border-slate-400 focus:outline-none appearance-none">
      <option value="music" {{ $oldSearchType === 'music' ? 'selected' : '' }}>music title</option>
      <option value="artist" {{ $oldSearchType === 'artist' ? 'selected' : '' }}>artist</option>
      <option value="review" {{ $oldSearchType === 'review' ? 'selected' : '' }}>review</option>
    </select>
    <input id="q" type="text" name="q" placeholder="Please enter keywords..." value="{{ old('q', $q) }}"
      class="w-full sm:w-96 rounded-md sm:rounded-l-none h-10 pl-4 pr-4 border-slate-300 text-slate-600 bg-slate-100 hover:border-slate-400 dark:border-slate-500 dark:text-slate-125 dark:bg-slate-600 dark:hover:border-slate-400 focus:outline-none appearance-none">
    <button id="search-button" type="submit" class="btn btn-indigo m-0 mt-1 sm:mt-0 sm:ml-2 px-4 h-10 w-full sm:w-auto font-bold">Search</button>
  </div>
</form>

<script>
  const searchInput = document.getElementById('q');
  const searchButton = document.getElementById('search-button');

  // ページ読み込み時に検索窓の値をチェック
  window.addEventListener('DOMContentLoaded', (event) => {
    if (searchInput.value.trim() !== '') {
      searchButton.classList.remove('opacity-50', 'cursor-not-allowed');
      searchButton.disabled = false;
    }
  });

  // 検索窓の値が変更されたときに値をチェック
  searchInput.addEventListener('input', function() {
    if (searchInput.value.trim() === '') {
      searchButton.classList.add('opacity-50', 'cursor-not-allowed');
      searchButton.disabled = true;
    } else {
      searchButton.classList.remove('opacity-50', 'cursor-not-allowed');
      searchButton.disabled = false;
    }
  });
</script>
