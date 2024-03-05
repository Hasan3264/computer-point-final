@php
$totalReview =totalReviews($productId);
$totalStar =total_star($productId);
@endphp
@if ($totalReview == 0 && $totalStar == 0)
<ul class="d-flex iconcolor">
@for ($i = 0; $i < 5; $i++)
<li><a><i class="far fa-star"></i></a></li>
@endfor
</ul>
@else
@php
$avgStar=round($totalStar / $totalReview,1);
@endphp
<x-star-rating :avgStar="$avgStar" :totalReviews="$totalReview" />
@endif

