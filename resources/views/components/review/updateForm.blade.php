<div>
  <form action="{{ route('review.update') }}" method="post">
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
      @for ( $i = 1; $i <= 5; $i++ )
        <option value="{{ $i }}" {{ $i === old('rate', $review->rate) ? 'selected' : ''}}>
          {{ $i }}
        </option>
      @endfor
    </select>
    <br />

    @error('title')
      <p style="color: red;">{{ $message }}</p>
    @enderror
    <label for="title">タイトル</label>
    <input id="title" type="text" name="title" placeholder="タイトルを入力してください" value="{{ old('title', $review->title) }}"></input>
    <br />

    @error('content')
      <p style="color: red;">{{ $message }}</p>
    @enderror
    <label for="content">レビュー</label>
    <textarea id="content" name="content" rows="5" cols="80" placeholder="レビューを書いてください">{{ old('content', $review->content) }}</textarea>
    <br />

    <button type="submit">編集</button>
  </form>
</div>
