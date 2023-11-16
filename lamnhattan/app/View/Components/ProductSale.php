<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductSale extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $list_product = Product::whereIn('id', function ($query) {
            $query->select('product_id')->from('productsale');
        })->get();

        return view('components.product-sale', compact('list_product'));
    }
}
