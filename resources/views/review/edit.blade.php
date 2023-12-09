<x-layout title='Classic Music Review App'>
  <x-recording.detail-card :recording=$recording />

  @if ( $review->title === null )
    <div class="mx-5 mb-5">
      <p>レビューは評価だけでも構いません。その場合、他の人にあなたの評価は表示されません。</p>
    </div>
  @endif

  @include('components.review.form', [
    'recording' => $recording,
    'review' => $review,
    'formType' => 'update',
    'buttonText' => '編集',
  ])
</x-layout>
