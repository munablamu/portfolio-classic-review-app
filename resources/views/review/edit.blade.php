<x-layout title='Classic Music Review App'>
  <x-recording.detail-card :recording=$recording />

  @include('components.review.updateForm', [
    'recording' => $recording,
    'review' => $review
  ])
</x-layout>
