@php
$fullStars = floor($rate);
$halfStar = ($rate - $fullStars) > 0 ? 1 : 0;
$emptyStars = 5 - $fullStars - $halfStar;
@endphp

<div class="flex items-center gap-0 text-base">
  @for ($i = 0; $i < $fullStars; $i++)
    <i class="fas fa-star text-slate-400 dark:text-slate-500"></i>
  @endfor
  @if ($halfStar)
    <i class="fas fa-star-half-alt text-slate-400 dark:text-slate-500"></i>
  @endif
  @for ($i = 0; $i < $emptyStars; $i++)
    <i class="far fa-star text-gray-300 dark:text-gray-700"></i>
  @endfor
</div>
