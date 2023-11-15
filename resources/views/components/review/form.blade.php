<div>
  <form action="{{ route('review.store') }}" method="post">
    @csrf

    @error('recording_id')
      <p style="color: red;">{{ $message }}</p>
    @enderror
    <input type="hidden" name="recording_id" value="{{ $recording_id }}">

    @error('rate')
      <p style="color: red;">{{ $message }}</p>
    @enderror
    <label for="rate">評価</label>
    <select id="rate" name="rate">
      <option value="{{ -1 }}">--- 1から5の中から選んでください ---</option>
      @for ( $i = 1; $i <= 5; $i++ )
        <option value="{{ $i }}">{{ $i }}</option>
      @endfor
    </select>
    <br />

    @error('title')
      <p style="color: red;">{{ $message }}</p>
    @enderror
    <label for="title">タイトル</label>
    <input id="title" type="text" name="title" placeholder="タイトルを入力してください" value="{{ old('title') }}"></input>
    <br />

    @error('content')
      <p style="color: red;">{{ $message }}</p>
    @enderror
    <label for="content">レビュー</label>
    <textarea id="content" name="content" rows="5" cols="80" placeholder="レビューを書いてください"></textarea>
    <br />

    <button type="submit">投稿</button>
  </form>
</div>
