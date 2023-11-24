<x-layout title='Classic Music Review App'>
  <x-recording.detail-card :recording=$recording />

  <!-- TODO: ここもそれっぽくする -->
  @guest
    <div>
      <p><a href="{{ route('login') }}">ログイン</a>をして、あなたもレビューを投稿してみませんか？</p>
    </div>
  @endguest

  @auth
    @empty ( $user_review )
      <div>
        <a href="{{ route('review.create', ['recording' => $recording]) }}">
          {{ Auth::user()->name }}さんも、レビューを投稿してみましょう。
        </a>
      </div>
    @else
      <div class="relative w-full max-w-[60rem] mx-auto">
        <p>あなたのレビュー</p>
        <div>
          <!-- TODO: これをコントローラー内で行う -->
          @empty ( $user_review->title )
            @php
              $user_review->content = "レビュー文がありません。"
            @endphp
          @endempty
          <x-review.card :review=$user_review />
          <div class="flex justify-end items-center">
            <x-common.buttons.blue>
              <a href="{{ route('review.edit', ['recording' => $recording]) }}">編集</a>
            </x-common.buttons.blue>
            <form action="{{ route('review.delete', ['review' => $user_review]) }}" method="post">
              @method('DELETE')
              @csrf
              <x-common.buttons.red type="submit">削除</x-common.buttons.red>
            </form>
          </div>
        </div>
        <hr class="border-t border-blue-gray-200 mb-8">
      </div>
    @endempty
  @endauth

  <div class="relative w-full max-w-[60rem] mx-auto">
    @foreach ( $reviews as $i_review )
      <x-review.card :review=$i_review />
      <hr class="border-t border-blue-gray-200">
    @endforeach
    {{ $reviews->links() }}
  </div>
</x-layout>
