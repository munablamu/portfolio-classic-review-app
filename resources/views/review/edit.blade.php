<x-layout title='Classic Music Review App'>
  <h1>Review Edit</h1>

  @include('components.review.updateForm', [
    'recording' => $recording,
    'review' => $review
  ])
</x-layout>
