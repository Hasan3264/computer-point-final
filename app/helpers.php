<?php
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;

function totalReviews($productId) {
    $total_reviews = OrderProduct::where('product_id',$productId)->whereNotNull('review')->count();
   return $total_reviews;
}
function total_star($productId) {
    $total_star = OrderProduct::where('product_id', $productId)->whereNotNull('review')->sum('star');
    return $total_star;
}
