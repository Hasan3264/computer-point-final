<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{
    public $avgStar;
    public $totalReviews;

    public function __construct($avgStar, $totalReviews)
    {
        $this->avgStar = round($avgStar, 1);
        $this->totalReviews = $totalReviews;
    }

    public function render()
    {
        return view('components.star-rating');
    }
}
