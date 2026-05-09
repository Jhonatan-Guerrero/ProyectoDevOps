<?php

namespace App\Livewire\Catalog;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public Product $product;
    public int $quantity = 1;

    public function mount(Product $product): void
    {
        if (!$product->active) {
            abort(404);
        }
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.catalog.product-detail')
            ->layout('layouts.guest');
    }
}
