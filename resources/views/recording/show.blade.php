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
            <x-review.card :review=$user_review />
          </div>
        </div>
      @endempty
    @endauth
  @endif

  @php
    $orderBy = request()->query('orderBy', 'like');
  @endphp
  <div class="my-4 text-right mx-5">
    <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 dark:border-sky-300 {{ $orderBy === 'like' ? ' bg-slate-500 text-slate-50 dark:bg-sky-300 dark:text-slate-700' : 'bg-slate-150 text-slate-500 dark:bg-slate-700 dark:text-sky-300' }}"
      href="{{ route('recording.show', ['recording' => $recording, 'orderBy' => 'like']) }}">
      <i class="fa-solid fa-heart mr-1"></i>いいね順
    </a>
    <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 dark:border-sky-300 {{ $orderBy === 'rate' ? ' bg-slate-500 text-slate-50 dark:bg-sky-300 dark:text-slate-700' : 'bg-slate-150 text-slate-500 dark:bg-slate-700 dark:text-sky-300' }}"
      href="{{ route('recording.show', ['recording' => $recording, 'orderBy' => 'rate']) }}">
      <i class="fa-solid fa-star mr-1"></i>高評価順
    </a>
    <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 dark:border-sky-300 {{ $orderBy === 'updated_at' ? ' bg-slate-500 text-slate-50 dark:bg-sky-300 dark:text-slate-700' : 'bg-slate-150 text-slate-500 dark:bg-slate-700 dark:text-sky-300' }}"
      href="{{ route('recording.show', ['recording' => $recording, 'orderBy' => 'updated_at']) }}">
      <i class="fa-solid fa-calendar-plus mr-1"></i>新着投稿順
    </a>
  </div>

  <ul>
    @foreach ( $reviews as $i_review )
      <li>
        <x-review.card :review=$i_review />
      </li>
    @endforeach
  </ul>
  {{ $reviews->appends(request()->query())->links() }}
</x-layout>
