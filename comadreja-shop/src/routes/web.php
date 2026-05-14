<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Profile\EditProfile;
use App\Livewire\Products\CreateProduct;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', EditProfile::class)->name('profile');
    Route::get('/products/create', CreateProduct::class)->name('products.create');
});

use App\Livewire\Products\ProductList;

Route::get('/products', ProductList::class)->middleware('auth')->name('products.index');

use App\Livewire\Products\EditProduct;

Route::get('/products/{product}/edit', EditProduct::class)->middleware('auth')->name('products.edit');

use App\Livewire\Catalog\ProductCatalog;

Route::get('/catalog', ProductCatalog::class)->name('catalog');

use App\Livewire\Catalog\ProductDetail;

Route::get('/catalog/{product}', ProductDetail::class)->name('catalog.show');

use App\Livewire\Cart\ShoppingCart;

Route::get('/cart', ShoppingCart::class)->middleware('auth')->name('cart');

use App\Livewire\Checkout\CheckoutForm;

Route::middleware('auth')->group(function () {
    Route::get('/checkout', CheckoutForm::class)->name('checkout');
    Route::get('/checkout/confirm', function () {
        return view('checkout-confirm');
    })->name('checkout.confirm');
});

use App\Livewire\Pedidos\MisPedidos;

Route::get('/orders', MisPedidos::class)->middleware('auth')->name('orders');

use App\Livewire\Pedidos\PedidosVendedor;

Route::get('/vendor/orders', PedidosVendedor::class)->middleware('auth')->name('vendor.orders');

use App\Livewire\Pedidos\DetallePedido;

Route::get('/vendor/orders/{pedido}', DetallePedido::class)->middleware('auth')->name('vendor.orders.show');

use App\Livewire\Profile\EditarPerfil;

Route::get('/profile/edit', EditarPerfil::class)->middleware('auth')->name('profile.edit');
