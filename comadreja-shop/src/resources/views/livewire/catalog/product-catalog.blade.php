<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    {{-- Navbar --}}
    <nav class="w-full px-6 py-3 flex items-center justify-between" style="background-color: #B9EBD7;">
        <h1 class="text-lg font-bold" style="color: #111827;">Comadreja Shop</h1>
        <div class="flex-1 mx-6">
            <div class="flex items-center" style="background:white; border-radius:10px; border:1px solid #9DD4C0; padding: 6px 14px; max-width: 400px;">
                <input wire:model.live="search" type="text" placeholder="Buscar productos..."
                    class="outline-none text-sm w-full" style="color:#111827; background:transparent;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="#6B7280">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="/cart">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#111827">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13M10 21a1 1 0 1 0 2 0M17 21a1 1 0 1 0 2 0"/>
                </svg>
            </a>
            @auth
                <a href="/profile">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#111827">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </a>
                <span class="text-sm font-medium" style="color:#111827;">{{ auth()->user()->name }}</span>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#111827">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1"/>
                        </svg>
                    </button>
                </form>
            @else
                <a href="/login" class="text-sm px-4 py-1 rounded-lg text-white" style="background-color:#2563EB;">Iniciar sesión</a>
                <a href="/register" class="text-sm px-4 py-1 rounded-lg" style="border:1px solid #111827; color:#111827;">Registrarse</a>
            @endauth
        </div>
    </nav>

    {{-- Hero --}}
    <div class="text-center py-10 px-4" style="background-color: #F0FAF6;">
        <h2 class="text-3xl font-bold" style="color:#111827;">Bienvenido a Comadreja Shop</h2>
        <p class="mt-2 text-sm" style="color:#6B7280;">Encuentra los mejores productos al mejor precio</p>
        <a href="#catalogo" class="mt-4 inline-block px-6 py-2 text-white rounded-lg text-sm" style="background-color:#2563EB;">
            Explorar
        </a>
    </div>

    {{-- Filtros --}}
    <div id="catalogo" class="px-8 py-4 flex gap-4 items-end flex-wrap" style="background-color:white; border-bottom:1px solid #E5E7EB;">
        <div>
            <label class="block text-xs mb-1" style="color:#6B7280;">Categoría</label>
            <select wire:model.live="category_id"
                class="px-3 py-2 text-sm outline-none"
                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827; min-width:180px;">
                <option value="">Todas las categorías</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs mb-1" style="color:#6B7280;">Precio mínimo</label>
            <input wire:model.live="min_price" type="number" placeholder="$0"
                class="px-3 py-2 text-sm outline-none"
                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827; width:120px;">
        </div>
        <div>
            <label class="block text-xs mb-1" style="color:#6B7280;">Precio máximo</label>
            <input wire:model.live="max_price" type="number" placeholder="$999"
                class="px-3 py-2 text-sm outline-none"
                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827; width:120px;">
        </div>
    </div>

    {{-- Productos --}}
    <main class="px-8 py-8">
        @if($products->isEmpty())
            <div class="text-center py-16" style="color:#6B7280;">
                <p class="text-lg">No se encontraron productos.</p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-6" style="grid-template-columns: repeat(3, minmax(0, 1fr));">
                @foreach($products as $product)
                <div class="bg-white rounded-xl overflow-hidden" style="border:1px solid #E5E7EB;">
                    <div class="h-48 flex items-center justify-center" style="background:#F9FAFB;">
                        @if($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                class="h-full w-full object-cover">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="#D1D5DB">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="p-4">
                        <p class="text-xs mb-1" style="color:#6B7280;">{{ $product->category?->name ?? 'Sin categoría' }}</p>
                        <h3 class="font-medium text-sm mb-2" style="color:#111827;">{{ $product->name }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="font-bold" style="color:#111827;">${{ number_format($product->price, 2) }}</span>
                            <a href="/catalog/{{ $product->id }}"
                                class="px-3 py-1 text-xs text-white rounded-lg"
                                style="background-color:#2563EB;">
                                Ver detalle
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </main>
</div>
