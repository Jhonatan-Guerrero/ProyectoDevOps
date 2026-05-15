<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    @include('partials.navbar')

    <div class="flex">
        <aside class="w-52 min-h-screen pt-4 px-2" style="background-color: white; border-right: 1px solid #E5E7EB;">
            <ul class="space-y-1">
                <li>
                    <a href="/products" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium" style="background-color:#F0FAF6; color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        Mis Productos
                    </a>
                </li>
                <li>
                    <a href="/vendor/orders" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm" style="color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Pedidos
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
            <div class="w-full max-w-lg bg-white rounded-xl p-8" style="border: 1px solid #E5E7EB;">
                <h2 class="text-xl font-bold mb-6" style="color:#111827;">Editar Producto</h2>

                @if (session()->has('success'))
                    <div class="mb-4 px-4 py-3 rounded-lg text-sm" style="background-color: #B9EBD7; color: #111827;">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                <form wire:submit="save" class="space-y-4">
                    <div>
                        <label class="block text-sm mb-1" style="color: #111827;">Nombre del producto</label>
                        <input wire:model="name" type="text"
                            class="w-full px-3 py-2 text-sm outline-none"
                            style="border: 1px solid #D1D5DB; background: white; color: #111827; border-radius: 6px;">
                        @error('name') <p class="text-xs mt-1" style="color: #EF4444;">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm mb-1" style="color: #111827;">Descripcion</label>
                        <textarea wire:model="description" rows="3"
                            class="w-full px-3 py-2 text-sm outline-none"
                            style="border: 1px solid #D1D5DB; background: white; color: #111827; border-radius: 6px;"></textarea>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label class="block text-sm mb-1" style="color: #111827;">Precio</label>
                            <input wire:model="price" type="number" step="0.01"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border: 1px solid #D1D5DB; background: white; color: #111827; border-radius: 6px;">
                            @error('price') <p class="text-xs mt-1" style="color: #EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm mb-1" style="color: #111827;">Stock</label>
                            <input wire:model="stock" type="number"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border: 1px solid #D1D5DB; background: white; color: #111827; border-radius: 6px;">
                            @error('stock') <p class="text-xs mt-1" style="color: #EF4444;">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm mb-1" style="color: #111827;">Categoria</label>
                        <select wire:model="category_id"
                            class="w-full px-3 py-2 text-sm outline-none"
                            style="border: 1px solid #D1D5DB; background: white; color: #111827; border-radius: 6px;">
                            <option value="">-- Selecciona una categoria --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm mb-1" style="color: #111827;">URL de la imagen</label>
                        <input wire:model="image_url" type="text"
                            class="w-full px-3 py-2 text-sm outline-none"
                            style="border: 1px solid #D1D5DB; background: white; color: #111827; border-radius: 6px;">
                        @error('image_url') <p class="text-xs mt-1" style="color: #EF4444;">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex gap-3 pt-2">
                        <a href="/products" class="px-5 py-2 text-sm" style="border: 1px solid #D1D5DB; border-radius: 6px; color: #111827;">
                            Cancelar
                        </a>
                        <button type="submit" class="px-5 py-2 text-white text-sm" style="background-color: #2563EB; border-radius: 6px;">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
