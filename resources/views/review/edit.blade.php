<x-layout title='Classic Music Review App'>
  <x-recording.detail-card :recording=$recording />

  @include('components.review.form', [
    'recording' => $recording,
    'review' => $review,
    'formType' => 'update',
    'buttonText' => '編集',
  ])
</x-layout>
