<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    

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
            <label class="block text-xs mb-1" style="color:#6B7280;">Categoria</label>
            <select wire:model.live="category_id"
                class="px-3 py-2 text-sm outline-none"
                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827; min-width:180px;">
                <option value="">Todas las categorias</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs mb-1" style="color:#6B7280;">Precio minimo</label>
            <input wire:model.live="min_price" type="number" placeholder="$0"
                class="px-3 py-2 text-sm outline-none"
                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827; width:120px;">
        </div>
        <div>
            <label class="block text-xs mb-1" style="color:#6B7280;">Precio maximo</label>
            <input wire:model.live="max_price" type="number" placeholder="$999"
                class="px-3 py-2 text-sm outline-none"
                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827; width:120px;">
        </div>
    </div>

    {{-- Productos --}}
    <main class="px-8 py-8">

        @if(!empty($search))
            <p class="text-sm mb-4" style="color:#6B7280;">Resultados para: <span class="font-medium" style="color:#111827;">"{{ $search }}"</span></p>
        @endif

        @if($products->isEmpty())
            <div class="text-center py-16" style="color:#6B7280;">
                <p class="text-lg">No se encontraron productos.</p>
                <a href="/catalog" class="text-sm mt-2 inline-block" style="color:#2563EB;">Ver todos los productos</a>
            </div>
        @else
            <div class="grid grid-cols-3 gap-6">
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
                        <p class="text-xs mb-1" style="color:#6B7280;">{{ $product->category?->name ?? 'Sin categoria' }}</p>
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
