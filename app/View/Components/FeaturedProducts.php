<?php

namespace App\View\Components;

use App\Models\AllProduct;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedProducts extends Component
{
    public $products;   
    public function __construct()
    {
        $this->products = AllProduct::orderBy('created_at', 'desc')->where('productstatus','=','published')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured-products');
    }
}
