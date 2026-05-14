<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    @include('partials.navbar') <div style="display:none">
        <h1 class="text-lg font-bold" style="color: #111827;">Comadreja Shop</h1>
        <div class="flex-1 mx-6">
            <div class="flex items-center" style="background:white; border-radius:10px; border:1px solid #9DD4C0; padding: 6px 14px; max-width: 400px;">
                <input type="text" placeholder="Buscar productos..." class="outline-none text-sm w-full" style="color:#111827; background:transparent;">
            </div>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm font-medium" style="color:#111827;">{{ auth()->user()?->name }}</span>
            @auth
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="text-sm" style="color:#111827;">Salir</button>
            </form>
            @else
            <a href="/login" class="text-sm px-4 py-1 rounded-lg text-white" style="background-color:#2563EB;">Iniciar sesión</a>
            @endauth
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-8 py-10">

        <div class="flex items-center gap-2 text-sm mb-6" style="color:#6B7280;">
            <a href="/catalog" style="color:#2563EB;">Catálogo</a>
            <span>/</span>
            <span>{{ $product->name }}</span>
        </div>

        @if (session()->has('cart_success'))
            <div class="mb-4 px-4 py-3 rounded-lg text-sm" style="background-color: #B9EBD7; color: #111827;">
                ✓ {{ session('cart_success') }}
                <a href="/cart" class="ml-2 underline font-medium">Ver carrito</a>
            </div>
        @endif

        <div class="bg-white rounded-xl p-8 flex gap-8" style="border:1px solid #E5E7EB;">
            <div class="w-80 h-80 flex items-center justify-center rounded-xl overflow-hidden flex-shrink-0" style="background:#F9FAFB; border:1px solid #E5E7EB;">
                @if($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="#D1D5DB">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                @endif
            </div>

            <div class="flex-1">
                <p class="text-xs mb-1" style="color:#6B7280;">{{ $product->category?->name ?? 'Sin categoría' }}</p>
                <h2 class="text-2xl font-bold mb-2" style="color:#111827;">{{ $product->name }}</h2>
                <p class="text-3xl font-bold mb-4" style="color:#111827;">${{ number_format($product->price, 2) }}</p>

                @if($product->description)
                    <p class="text-sm mb-4" style="color:#6B7280;">{{ $product->description }}</p>
                @endif

                <p class="text-sm mb-4" style="color:#6B7280;">
                    Stock disponible: <span class="font-medium" style="color:#111827;">{{ $product->stock }} unidades</span>
                </p>

                <div class="flex items-center gap-3 mb-6">
                    <label class="text-sm font-medium" style="color:#111827;">Cantidad</label>
                    <input wire:model="quantity" type="number" min="1" max="{{ $product->stock }}"
                        class="px-3 py-2 text-sm outline-none w-24"
                        style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                </div>

                <button wire:click="addToCart"
                    class="px-6 py-2 text-white text-sm rounded-lg font-medium"
                    style="background-color:#2563EB;">
                    Agregar al carrito
                </button>
            </div>
        </div>
    </main>
</div>
