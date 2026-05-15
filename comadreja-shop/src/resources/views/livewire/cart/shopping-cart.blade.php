<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    @include('partials.navbar')

    <div class="flex">
        <aside class="w-52 min-h-screen pt-4 px-2" style="background-color: white; border-right: 1px solid #E5E7EB;">
            <ul class="space-y-1">
                <li>
                    <a href="/catalog" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm" style="color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="/cart" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium" style="background-color:#F0FAF6; color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13M10 21a1 1 0 1 0 2 0M17 21a1 1 0 1 0 2 0"/>
                        </svg>
                        Mi Carrito
                    </a>
                </li>
                <li>
                    <a href="/orders" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm" style="color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Mis Pedidos
                    </a>
                </li>
                <li>
                    <a href="/profile" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm" style="color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Mi Perfil
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 p-8">
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="#D1D5DB">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13M10 21a1 1 0 1 0 2 0M17 21a1 1 0 1 0 2 0"/>
                    </svg>
                    <p class="text-lg font-medium mb-2" style="color:#111827;">Tu carrito esta vacio</p>
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
</div>
