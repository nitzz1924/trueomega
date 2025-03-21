<?php

namespace App\View\Components;

use App\Models\WebsiteSetting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeSlider extends Component
{
    public $websitedata;
    public function __construct()
    {
        $this->websitedata = WebsiteSetting::first();
    }

    public function render(): View|Closure|string
    {
        return view('components.home-slider');
    }
}
