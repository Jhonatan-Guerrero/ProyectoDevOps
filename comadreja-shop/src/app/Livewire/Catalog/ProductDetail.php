<?php

namespace App\Livewire\Catalog;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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

    public function addToCart(): void
    {
        if (!Auth::check()) {
            $this->redirect(route('login'));
            return;
        }

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $item = $cart->items()->where('product_id', $this->product->id)->first();

        if ($item) {
            $item->update(['quantity' => $item->quantity + $this->quantity]);
        } else {
            $cart->items()->create([
                'product_id' => $this->product->id,
                'quantity'   => $this->quantity,
            ]);
        }

        session()->flash('cart_success', '¡Producto agregado al carrito correctamente!');
        $this->redirect(route('cart'));
    }

    public function render()
    {
        return view('livewire.catalog.product-detail')
            ->layout('layouts.guest');
    }
}
