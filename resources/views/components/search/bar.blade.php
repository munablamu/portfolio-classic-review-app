<form action="{{ route('search.index') }}" method='get' class="flex flex-col sm:flex-row items-center m-2 flex-grow sm:w-auto">
  <select name="search_type" class="rounded-md sm:rounded-r-none h-10 pl-5 pr-10 w-full capitalize sm:w-auto border border-slate-300 text-slate-600 bg-slate-100 hover:border-slate-400 dark:border-slate-500 dark:text-slate-125 dark:bg-slate-600 dark:hover:border-slate-400 focus:outline-none appearance-none">
    <option value="music" {{ $oldSearchType === 'music' ? 'selected' : '' }}>music title</option>
    <option value="artist" {{ $oldSearchType === 'artist' ? 'selected' : '' }}>artist</option>
    <option value="review" {{ $oldSearchType === 'review' ? 'selected' : '' }}>review</option>
  </select>
  <input id='q' type="text" name="q"
    class="rounded-md sm:rounded-l-none h-10 pl-5 pr-5 w-full sm:w-auto border border-slate-300 text-slate-600 bg-slate-100 hover:border-slate-400 dark:border-slate-500 dark:text-slate-125 dark:bg-slate-600 dark:hover:border-slate-400 focus:outline-none appearance-none"
    placeholder="Please enter keywords..." value="{{ old('q', $q) }}" {{ (isset($fromTopController) && $fromTopController) ? 'autofocus' : '' }}>
  {{-- sm:w-20を付けないとtopページで表示がおかしくなる。 --}}
  <button id="search-button" type="submit" class="btn btn-indigo px-6 ml-2 h-10 w-full sm:w-20 font-bold" disabled>Search</button>
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
