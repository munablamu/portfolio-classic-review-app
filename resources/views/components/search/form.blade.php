<form action="{{ route('search.index') }}" method='get'>
  @csrf
  <label for='q'></label>
  <input id='q' type='text' name='q' placeholder='キーワードを入力してください' value="{{ $q }}"></input>
  <button type='submit' name='search_type' value='music'>曲名検索</button>
  <button type='submit' name='search_type' value='artist'>演奏家検索</button>
  <button type='submit' name='search_type' value='review'>レビュー検索</button>
</from>
