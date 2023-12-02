<x-layout title='Classic Music Review App'>
  <x-recording.detail-card :recording=$recording />

  @php
    $page = Request::input('page', '1');
  @endphp

  @if ( $page === '1' )
    @guest
      <div class="mx-5 mb-10">
        <p><a class="url" href="{{ route('login') }}">ログイン</a>して、あなたもレビューを投稿してみませんか？</p>
      </div>
    @endguest

    @auth
      @empty ( $user_review )
        <div class="flex justify-between items-center mx-5 mb-10">
          <span>{{ Auth::user()->name }}さんも、レビューを投稿してみましょう。</span>
          <a class="btn btn-indigo" href="{{ route('review.create', ['recording' => $recording]) }}">投稿</a>
        </div>
      @else
        <div class="relative w-full max-w-[60rem] mx-auto">
          <div>
            <!-- TODO: これをコントローラー内で行う -->
            @empty ( $user_review->title )
              @php
                $user_review->content = "レビュー文がありません。"
              @endphp
            @endempty
            <x-review.card :review=$user_review />
          </div>
        </div>
      @endempty
    @endauth
  @endif

  <ul>
    @foreach ( $reviews as $i_review )
      <li>
        <x-review.card :review=$i_review />
      </li>
    @endforeach
  </ul>
  {{ $reviews->links() }}
</x-layout>
