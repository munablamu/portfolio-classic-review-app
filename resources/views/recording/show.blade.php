<x-layout :title="$recording->title">
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
        <div class="mx-5 mb-10">
          <p>{{ Auth::user()->name }}さんも、レビューを投稿してみましょう。</p>
          <a class="btn btn-indigo font-bold" href="{{ route('review.create', ['recording' => $recording]) }}">
            <i class="fa-solid fa-pen-nib"></i><span class="ml-1">投稿</span>
          </a>
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
            <x-review.card :review=$user_review :clamp=false />
          </div>
        </div>
      @endempty
    @endauth
  @endif

  @php
    $orderBy = request()->query('orderBy', 'like');
  @endphp
  <ul class="my-4 mx-5 py-1 overflow-x flex flex-row ss:justify-end">
    <li class="whitespace-nowrap">
      <a class="order {{ $orderBy === 'like' ? 'order-true' : 'order-false' }}"
        href="{{ route('recording.show', ['recording' => $recording, 'orderBy' => 'like']) }}">
        <i class="fa-solid fa-heart mr-1"></i>いいね順
      </a>
    </li>
    <li class="whitespace-nowrap">
      <a class="order {{ $orderBy === 'rate' ? 'order-true' : 'order-false' }}"
        href="{{ route('recording.show', ['recording' => $recording, 'orderBy' => 'rate']) }}">
        <i class="fa-solid fa-star mr-1"></i>高評価順
      </a>
    </li>
    <li class="whitespace-nowrap">
      <a class="order {{ $orderBy === 'updated_at' ? 'order-true' : 'order-false' }}"
        href="{{ route('recording.show', ['recording' => $recording, 'orderBy' => 'updated_at']) }}">
        <i class="fa-solid fa-calendar-plus mr-1"></i>新着投稿順
      </a>
    </li>
  </ul>

  <div>
    @if ( $reviews->count() === 0 )
      <p>まだレビューを書いている人がいません。</p>
    @else
      <ul>
        @foreach ( $reviews as $i_review )
          <li>
            <x-review.card :review=$i_review :clamp=true />
          </li>
        @endforeach
      </ul>
    @endif
  </div>
  <div class="mx-5">
    {{ $reviews->appends(request()->query())->links('vendor.pagination.original') }}
  </div>
</x-layout>

<x-common.help message="「{{ $recording->artists_string }}」が演奏した「{{ $recording->title }}」というタイトルの録音(CDやアルバム)の詳細ページです。この録音に対する<strong class='strong-color-invert'>レビューの閲覧や投稿</strong>ができます。ログインすると、「<strong class='strong-color-invert'>いいね</strong>」や「<strong class='strong-color-invert'>お気に入り登録</strong>」が可能になります。" />
