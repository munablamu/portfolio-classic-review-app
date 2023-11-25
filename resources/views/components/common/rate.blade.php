@php
$fullStars = floor($rate);
$halfStar = ($rate - $fullStars) > 0 ? 1 : 0;
$emptyStars = 5 - $fullStars - $halfStar;
@endphp

<div class="flex items-center gap-0 text-base">
  @for ($i = 0; $i < $fullStars; $i++)
    <i class="fas fa-star text-yellow-400"></i>
  @endfor
  @if ($halfStar)
    <i class="fas fa-star-half-alt text-yellow-400"></i>
  @endif
  @for ($i = 0; $i < $emptyStars; $i++)
    <i class="far fa-star text-gray-300"></i>
  @endfor
</div>