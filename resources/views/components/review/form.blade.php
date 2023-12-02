<div class="mx-5 mb-5">
  <div class="mb-5">
    <p>{{ Auth::user()->name }}さんのレビューを書いてみましょう。</p>
    <p>レビューは評価だけでも構いません。その場合、他の人にあなたの評価は表示されません。</p>
  </div>

  <form action="{{ route('review.store', ['recording' => $recording]) }}" method="post">
    @csrf

    <label for="rate" class="block text-sm font-medium mb-1">評価</label>
    @error('rate')
      <span class="validate ml-4">星1つから5つで、評価してください。</span>
    @enderror
    <div id="user_rating" class="flex mb-4 text-lg">
      @for ( $i = 1; $i <= 5; $i++ )
        <i class="far fa-star text-gray-300 cursor-pointer"></i>
      @endfor
      <input type="hidden" id="rate" name="rate" value="0">
    </div>

    <label for="title" class="text-sm font-medium">タイトル</label>
    @error('title')
      <span class="validate ml-4">{{ $message }}</span>
    @enderror
    <div class="mb-5">
      <input id="title" type="text" name="title" class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 rounded-md" placeholder="タイトルを入力してください" value="{{ old('title') }}"></input>
    </div>

    <label for="content" class="text-sm font-medium">レビュー</label>
    @error('content')
      <span class="validate ml-4">{{ $message }}</span>
    @enderror
    <div class="mb-5">
      <textarea id="content" name="content" rows="10" class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 rounded-md" placeholder="レビューを書いてください"></textarea>
    </div>

    <div class="flex justify-end">
      <button type="submit" class="btn btn-indigo">投稿</button>
    </div>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#user_rating .fa-star').click(function(){
        var index = $(this).index();
        $('#rate').val(index + 1);
        $('#user_rating .fa-star').each(function(i){
          $(this).removeClass('fas fa-star text-slate-400').addClass(i <= index ? 'fas fa-star text-slate-400' : 'far fa-star text-gray-300');
        });
      });
    });
  </script>
</div>
