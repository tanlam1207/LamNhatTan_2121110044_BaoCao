<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductItemSale extends Component
{
    private $row_productsale=null;
    public function __construct($productitemsale)
    {
        $this->row_productsale=$productitemsale;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $productSale = $this->row_productsale->productSale;
        $productName = $this->row_productsale->name;
        $productSlug = $this->row_productsale->slug;
        $productImage = $this->row_productsale->image;
        $productPrice = $this->row_productsale->price;
        $categoryName = $this->row_productsale->category->name;
        
        $priceSale = $productSale ? $productSale->price_sale : null;

        return view('components.product-item-sale', compact('categoryName','productName','productSlug','productImage','productPrice', 'priceSale'));
    }
}
