<form action="{{ route('search.index') }}" method='get' class="flex flex-col sm:flex-row items-center m-2 flex-grow sm:w-auto">
  <select name="search_type" class="rounded-md sm:rounded-r-none h-10 pl-5 pr-10 w-full capitalize sm:w-auto border border-slate-300 text-slate-600 bg-slate-100 hover:border-slate-400 dark:border-slate-500 dark:text-slate-150 dark:bg-slate-600 dark:hover:border-slate-400 focus:outline-none appearance-none">
    <option value="music" {{ $oldSearchType === 'music' ? 'selected' : '' }}>music title</option>
    <option value="artist" {{ $oldSearchType === 'artist' ? 'selected' : '' }}>artist</option>
    <option value="review" {{ $oldSearchType === 'review' ? 'selected' : '' }}>review</option>
  </select>
  <input id='q' type="text" name="q" class="rounded-md sm:rounded-l-none h-10 pl-5 pr-5 w-full sm:w-auto border border-slate-300 text-slate-600 bg-slate-100 hover:border-slate-400 dark:border-slate-500 dark:text-slate-150 dark:bg-slate-600 dark:hover:border-slate-400 focus:outline-none appearance-none" placeholder="Please enter keywords..." value="{{ old('q', $q) }}">
  {{-- sm:w-20を付けないとtopページで表示がおかしくなる。 --}}
  <button type="submit" class="btn btn-indigo px-6 ml-2 h-10 w-full sm:w-20 font-bold">Search</button>
</form>
