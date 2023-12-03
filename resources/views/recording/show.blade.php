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

  @php
    $orderBy = request()->query('orderBy') ?? 'like';
  @endphp
  <div class="mb-5 text-right">
    <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 {{ $orderBy === 'like' ? ' bg-slate-500 text-slate-50' : 'bg-slate-150 text-slate-500' }}"
      href="{{ route('recording.show', ['recording' => $recording, 'orderBy' => 'like']) }}">いいね順</a>
    <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 {{ $orderBy === 'rate' ? ' bg-slate-500 text-slate-50' : 'bg-slate-150 text-slate-500' }}"
      href="{{ route('recording.show', ['recording' => $recording, 'orderBy' => 'rate']) }}">高評価順</a>
    <a class="py-1 px-2 mx-1 rounded-full border-2 border-slate-500 {{ $orderBy === 'updated_at' ? ' bg-slate-500 text-slate-50' : 'bg-slate-150 text-slate-500' }}"
      href="{{ route('recording.show', ['recording' => $recording, 'orderBy' => 'updated_at']) }}">新着投稿順</a>
  </div>

  <ul>
    @foreach ( $reviews as $i_review )
      <li>
        <x-review.card :review=$i_review />
      </li>
    @endforeach
  </ul>
  {{ $reviews->links() }}
</x-layout>
