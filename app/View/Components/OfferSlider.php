<?php

namespace App\View\Components;

use App\Models\WebsiteSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OfferSlider extends Component
{
    public $offersliderdata;
    public function __construct()
    {
        $this->offersliderdata = WebsiteSetting::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.offer-slider');
    }
}
