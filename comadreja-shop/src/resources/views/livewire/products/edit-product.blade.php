<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    {{-- Navbar --}}
    <nav class="w-full px-6 py-3 flex items-center justify-between" style="background-color: #B9EBD7;">
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
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#111827">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13M10 21a1 1 0 1 0 2 0M17 21a1 1 0 1 0 2 0"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#111827">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
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

    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-52 min-h-screen pt-4 px-2" style="background-color: white; border-right: 1px solid #E5E7EB;">
            <ul class="space-y-1">
                <li>
                    <a href="/dashboard" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm" style="color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/products" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium" style="background-color:#F0FAF6; color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        Mis Productos
                    </a>
                </li>
                <li>
                    <a href="/orders" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm" style="color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13M10 21a1 1 0 1 0 2 0M17 21a1 1 0 1 0 2 0"/>
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

        {{-- Contenido --}}
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
                        <label class="block text-sm mb-1" style="color:#111827;">Nombre del producto</label>
                        <input wire:model="name" type="text"
                            class="w-full px-3 py-2 text-sm outline-none"
                            style="border:1px solid #D1D5DB; background:white; color:#111827; border-radius:6px;">
                        @error('name') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm mb-1" style="color:#111827;">Descripción</label>
                        <textarea wire:model="description" rows="3"
                            class="w-full px-3 py-2 text-sm outline-none"
                            style="border:1px solid #D1D5DB; background:white; color:#111827; border-radius:6px;"></textarea>
                        @error('description') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label class="block text-sm mb-1" style="color:#111827;">Precio</label>
                            <input wire:model="price" type="number" step="0.01"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border:1px solid #D1D5DB; background:white; color:#111827; border-radius:6px;">
                            @error('price') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm mb-1" style="color:#111827;">Stock</label>
                            <input wire:model="stock" type="number"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border:1px solid #D1D5DB; background:white; color:#111827; border-radius:6px;">
                            @error('stock') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm mb-1" style="color:#111827;">Categoría</label>
                        <select wire:model="category_id"
                            class="w-full px-3 py-2 text-sm outline-none"
                            style="border:1px solid #D1D5DB; background:white; color:#111827; border-radius:6px;">
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm mb-1" style="color:#111827;">URL de la imagen</label>
                        <input wire:model="image_url" type="text"
                            class="w-full px-3 py-2 text-sm outline-none"
                            style="border:1px solid #D1D5DB; background:white; color:#111827; border-radius:6px;">
                        @error('image_url') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-3 pt-2">
                        <a href="/products"
                            class="px-5 py-2 text-sm"
                            style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="px-5 py-2 text-white text-sm"
                            style="background-color:#2563EB; border-radius:6px;">
                            Guardar cambios
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>
</div>
