<x-layout title='Classic Music Review App'>
  <x-recording.detail-card :recording=$recording />

  <div class="mx-5 mb-5">
    <p>{{ Auth::user()->name }}さんのレビューを書いてみましょう。</p>
    <p>レビューは評価だけでも構いません。その場合、他の人にあなたの評価は表示されません。</p>
  </div>

  @include('components.review.form', [
    'recording' => $recording,
    'formType' => 'store',
    'buttonText' => '投稿',
  ])
</x-layout>
