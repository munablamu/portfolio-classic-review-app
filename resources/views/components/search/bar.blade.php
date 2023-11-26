<form action="{{ route('search.index') }}" method='get' class="flex items-center">
  <div class="relative inline-flex">
    <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l189.21 189.211c9.372 9.373 24.749 9.373 34.121 0l189.211-189.211c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
    <select name="search_type" class="border border-gray-300 rounded-md rounded-r-none text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
      <option value="music" {{ $oldSearchType === 'music' ? 'selected' : '' }}>曲名</option>
      <option value="artist" {{ $oldSearchType === 'artist' ? 'selected' : '' }}>演奏家</option>
      <option value="review" {{ $oldSearchType === 'review' ? 'selected' : '' }}>レビュー</option>
    </select>
  </div>
  <input id='q' type="text" name="q" class="border border-gray-300 rounded-md rounded-l-none text-gray-600 h-10 pl-5 pr-5 bg-white hover:border-gray-400 focus:outline-none appearance-none" placeholder="キーワードを入力してください" value="{{ old('q', $q) }}">
  <button type="submit" class="flex items-center justify-center bg-blue-500 text-white px-6 py-2 rounded-md ml-2 hover:bg-blue-600 h-10">検索</button>
</form>
