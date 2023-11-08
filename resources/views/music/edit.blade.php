<x-layout title='Classic Music Review App'>
  <h1>Music Edit</h1>

  <form action="{{ route('music.update', ['id' => $music->id]) }}" method='post'>
    @method('PUT')
    @csrf

    @error('composer_id')
    <p style='color: red;'>{{ $message }}</p>
    @enderror
    <label for='composer_id'>作曲家</label>
    <select id='composer_id' name='composer_id'>
      @foreach ( $composers as $i_composer )
        <option value="{{ $i_composer->id }}"
          {{ $i_composer->id === old('composer_id', $music->composer_id) ? 'selected' : '' }}>
          {{ $i_composer->name }}
        </option>
      @endforeach
    </select><br />

    @error('title')
    <p style='color: red;'>{{ $message }}</p>
    @enderror
    <label for='title'>曲名</label>
    <input id='title' type='text' name='title' placeholder='曲名を入力'
      value="{{ old('title', $music->title) }}"></input><br />

    @error('opus')
    <p style='color: red;'>{{ $message }}</p>
    @enderror
    <label for='opus'>作品番号</label>
    <span>「op. **」や「BWV ***」のように書いてください。作品番号がない場合は何も記述しないでください。</span>
    <input id='opus' type='text' name='opus' placeholder='作品番号を入力'
      value="{{ old('opus', $music->opus) }}"></input><br />

    <button type='submit'>編集</button>
  </form>
</x-layout>
