<div class="mx-5 mb-5">
  <form action="{{ route('review.' . $formType, ['recording' => $recording]) }}" method="post">
    @csrf

    <label for="rate" class="inline-block text-sm font-medium mb-1">評価</label>
    @error('rate')
      <span class="validate ml-4">星1つから5つで、評価してください。</span>
    @enderror
    <div id="user_rating" class="flex mb-4 text-lg">
      @for ( $i = 1; $i <= 5; $i++ )
        <i class="fa-star cursor-pointer {{ $i <= old('rate', isset($review) ? $review->rate : 0) ? 'fas text-slate-400' : 'far text-gray-300' }}"></i>
      @endfor
      <input type="hidden" id="rate" name="rate" value="{{ old('rate', isset($review) ? $review->rate : 0) }}">
    </div>

    <label for="title" class="text-sm font-medium">タイトル</label>
    @error('title')
      <span class="validate ml-4">{{ $message }}</span>
    @enderror
    <div class="mb-5">
      <input id="title" type="text" name="title"
       class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md"
       placeholder="タイトルを入力してください" value="{{ old('title', isset($review) ? $review->title : null) }}"
      ></input>
    </div>

    <label for="content" class="text-sm font-medium">レビュー</label>
    @error('content')
      <span class="validate ml-4">{{ $message }}</span>
    @enderror
    <div class="mb-5">
      <textarea id="content" name="content" rows="10"
       class="shadow-sm focus:ring-indigo-500 mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-500 dark:bg-slate-600 rounded-md"
       placeholder="レビューを書いてください"
      >{{ old('content', isset($review) ? $review->content : null) }}</textarea>
    </div>

    @if ( isset($review) && $review->title !== null )
      <div class="flex justify-end">
        <span class="align-middle text-pink-400">
          <i class="far fa-heart like-btn mr-1"></i>{{ $review->like }}
        </span>
      </div>
      <div class="items-center my-2 border-2 p-2 bg-rose-100 border-rose-500 dark:bg-rose-700 dark:border-rose-700  rounded-lg">
        <span class="bg-rose-500 text-rose-50 dark:bg-rose-100 dark:text-rose-700 font-bold py-1 px-3 rounded-full mr-1">注意</span>
        <span class="text-rose-500 dark:text-rose-100 tracking-wide font-bold ">タイトルとレビューが空の場合、このレビューに対する「いいね」は0に戻ります。</span>
      </div>
    @endif

    <div class="flex justify-end mt-6">
      <button class="btn btn-indigo" type="submit">{{ $buttonText }}</button>
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
