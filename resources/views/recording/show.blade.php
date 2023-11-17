<x-layout title='Classic Music Review App'>
  <h1>Recording Detail</h1>

  <h2>
    <!-- TODO: ここの処理をHTMLに書かずに済むようにしたい -->
    @if ( $recording->artists !== null )
      @foreach ( $recording->artists as $i_artist )
        <a href="{{ route('artist.show', ['id' => $i_artist->id]) }}">{{ $i_artist->name }}</a>@if ( !$loop->last ), @endif
      @endforeach
    @else
      {{ '不明' }}
    @endif
  </h2>

  <div>
      <p>{{ $recording->title }}</p>
  </div>

  <div>
    <p>発売日: {{ $recording->release_date_string }}</p>
    <p>カタログ番号: {{ $recording->catalogue_no }}</p>
    <p>カスタマーレビュー: {{ $recording->average_rate }}</p>
  </div>

  <div>
    <!-- TODO 画像が存在しない倍の処理 -->
    <img src="{{ asset('storage/jackets/' . $recording->jacket_filename) }}" alt="" width="300">
  </div>

  @guest
    <div>
      <p><a href="{{ route('login') }}">ログイン</a>をして、あなたもレビューを投稿してみませんか？</p>
    </div>
  @endguest

  @auth
    @empty ( $user_review )
      <div>
        <a href="{{ route('review.create', ['recording_id' => $recording->id]) }}">
          {{ Auth::user()->name }}さんも、レビューを投稿してみましょう。
        </a>
      </div>
    @else
      <div>
        <p>あなたのレビュー</p>
        <div>
          <p>評価: {{ $user_review->rate }}</p>
          @isset ( $user_review->title )
            <p>{{ $user_review->title }}</p>
            <p>{{ $user_review->content }}</p>
            <p>いいね: {{ $user_review->like}}</p>
          @endisset
          <a href="{{ route('review.edit', ['recording_id' => $recording->id]) }}">レビューを修正しますか？ </p>
      </div>
    @endempty
  @endauth

  <div>
    @foreach ( $reviews as $i_review )
      <details>
        <summary>{{ $i_review->user->name }}, {{ $i_review->title }}, {{ $i_review->rate }}, {{ $i_review->like }}</summary>
        <div>
          <p>{{ $i_review->content }}</p>
          <!-- TODO: 多分ここでチェックするの良くない -->
          @php
            $liked = $i_review->likes()->where('user_id', Auth::id())->first();
          @endphp

          @if ( $liked )
            <form action="{{ route('likes.destroy', ['review' => $i_review->id]) }}" method="post">
              @method('DELETE')
              @csrf
              <button type="submit">いいねを解除する</button>
            </form>
          @else
            <form action="{{ route('likes.store', ['review' => $i_review->id]) }}" method="post">
              @csrf
              <button type="submit">いいね</button>
            </form>
          @endif
        </div>
      </details>
    @endforeach
  </div>
  {{ $reviews->links() }}
</x-layout>
