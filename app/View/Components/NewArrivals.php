<?php

namespace App\View\Components;
use App\Models\AllProduct;
use App\Models\WebsiteSetting;
use App\Models\Master;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewArrivals extends Component
{
    public $products , $categories, $websitedata;   
    public function __construct()
    {
        $this->products = AllProduct::orderBy('created_at', 'desc')->where('productstatus','=','published')->get();
        $this->categories = Master::where('type', 'Product Categories')->get();
        $this->websitedata = WebsiteSetting::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.new-arrivals');
    }
}
