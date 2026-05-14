<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    @include('partials.navbar') <div style="display:none">
        <h1 class="text-lg font-bold" style="color: #111827;">Comadreja Shop</h1>
        <div class="flex-1 mx-6">
            <div class="flex items-center" style="background:white; border-radius:10px; border:1px solid #9DD4C0; padding: 6px 14px; max-width: 400px;">
                <input type="text" placeholder="Buscar productos..." class="outline-none text-sm w-full" style="color:#111827; background:transparent;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="#6B7280">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm font-medium" style="color:#111827;">{{ auth()->user()->name }}</span>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#111827">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-8 py-10">
        <h2 class="text-2xl font-bold mb-6" style="color:#111827;">Carrito de Compras</h2>

        @if (session()->has('cart_success'))
            <div class="mb-4 px-4 py-3 rounded-lg text-sm" style="background-color: #B9EBD7; color: #111827;">
                ✓ {{ session('cart_success') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="mb-4 px-4 py-3 rounded-lg text-sm" style="background-color: #B9EBD7; color: #111827;">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if($items->isEmpty())
            <div class="text-center py-16 bg-white rounded-xl" style="border:1px solid #E5E7EB;">
                <p class="text-lg font-medium mb-2" style="color:#111827;">Tu carrito está vacío</p>
                <p class="text-sm mb-4" style="color:#6B7280;">Agrega productos para comenzar a comprar</p>
                <a href="/catalog" class="px-6 py-2 text-white text-sm rounded-lg" style="background-color:#2563EB;">
                    Ir a la tienda
                </a>
            </div>
        @else
            <div class="flex gap-6">
                <div class="flex-1 space-y-4">
                    @foreach($items as $item)
                    <div class="bg-white rounded-xl p-4 flex items-center gap-4" style="border:1px solid #E5E7EB;">
                        <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0" style="background:#F9FAFB;">
                            @if($item->product->image_url)
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center" style="background:#F3F4F6;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="#D1D5DB">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h3 class="font-medium text-sm" style="color:#111827;">{{ $item->product->name }}</h3>
                            <p class="text-sm" style="color:#6B7280;">${{ number_format($item->product->price, 2) }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                                class="w-7 h-7 rounded-full flex items-center justify-center text-sm font-bold"
                                style="background:#F3F4F6; color:#111827;">−</button>
                            <span class="text-sm font-medium w-6 text-center" style="color:#111827;">{{ $item->quantity }}</span>
                            <button wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})"
                                class="w-7 h-7 rounded-full flex items-center justify-center text-sm font-bold"
                                style="background:#F3F4F6; color:#111827;">+</button>
                        </div>
                        <p class="font-bold text-sm w-20 text-right" style="color:#111827;">
                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                        </p>
                        <button wire:click="removeItem({{ $item->id }})" class="ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#EF4444">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                    @endforeach
                </div>

                <div class="w-72 flex-shrink-0">
                    <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                        <h3 class="font-bold mb-4" style="color:#111827;">Resumen</h3>
                        <div class="flex justify-between text-sm mb-2" style="color:#6B7280;">
                            <span>Subtotal</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="border-t my-3" style="border-color:#E5E7EB;"></div>
                        <div class="flex justify-between font-bold mb-6" style="color:#111827;">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <a href="/checkout" class="block w-full text-center py-2 text-white text-sm rounded-lg font-medium" style="background-color:#2563EB;">
                            Pagar
                        </a>
                        <a href="/catalog" class="block w-full text-center py-2 text-sm rounded-lg font-medium mt-2" style="border:1px solid #D1D5DB; color:#111827;">
                            Volver al inicio
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </main>
</div>
