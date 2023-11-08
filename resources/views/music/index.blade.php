<x-layout title='Classic Music Review App'>
  <h1>Music List</h1>

  @if ( session('feedback.success') )
    <p style='color: green;'>{{ session('feedback.success') }}</p>
  @endif
  @if ( session('feedback.error') )
    <p style='color: red;'>{{ session('feedback.error') }}</p>
  @endif

  <form action="{{ route('music.store') }}" method='post'>
    @csrf

    @error('composer_id')
    <p style='color: red;'>{{ $message }}</p>
    @enderror
    <label for='composer_id'>作曲家</label>
    <select id='composer_id' name='composer_id'>
      <option value="{{ -1 }}">--- 誰を選択しますか？ ---</option>
      @foreach ( $composers as $i_composer )
        <option value="{{ $i_composer->id }}">{{ $i_composer->name }}</option>
      @endforeach
    </select><br />

    @error('title')
    <p style='color: red;'>{{ $message }}</p>
    @enderror
    <label for='title'>曲名</label>
    <input id='title' type='text' name='title' placeholder='曲名を入力'></input><br />

    @error('opus')
    <p style='color: red;'>{{ $message }}</p>
    @enderror
    <label for='opus'>作品番号</label>
    <span>「op. **」や「BWV ***」のように書いてください。作品番号がない場合は何も記述しないでください。</span>
    <input id='opus' type='text' name='opus' placeholder='作品番号を入力'></input><br />

    <button type='submit'>追加</button>
  </form>

  <div>
    @foreach ( $musics as $i_music )
      <details>
        <summary>{{ $i_music->title }}, {{ $i_music->opus}} (Composer: {{ $i_music->composer->name }})</summary>
        <div>
          <a href="{{ route('music.edit', ['id' => $i_music->id]) }}">編集</a>
        </div>
        <form action="{{ route('music.delete', ['id' => $i_music->id]) }}" method='post'>
          @method('DELETE')
          @csrf
          <button type='submit'>削除</button>
        </form>
      </details>
    @endforeach
  </div>
</x-layout>
