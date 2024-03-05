<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Ratings extends Component
{
    public $productId;

    /**
     * Create a new component instance.
     *
     * @param  int  $productId
     * @return void
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.ratings');
    }
}
