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

            @if (session()->has('success'))
                <div class="mb-4 px-4 py-3 rounded-lg text-sm" style="background-color: #B9EBD7; color: #111827;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold" style="color:#111827;">Mis Productos</h2>
                <a href="/products/create"
                    class="px-4 py-2 text-white text-sm rounded-lg"
                    style="background-color: #2563EB;">
                    + Crear producto
                </a>
            </div>

            @if($products->isEmpty())
                <div class="text-center py-16" style="color:#6B7280;">
                    <p class="text-lg">Aún no tienes productos registrados.</p>
                    <a href="/products/create" class="text-sm mt-2 inline-block" style="color:#2563EB;">Crea tu primer producto</a>
                </div>
            @else
                <div class="bg-white rounded-xl overflow-hidden" style="border: 1px solid #E5E7EB;">
                    <table class="w-full text-sm">
                        <thead>
                            <tr style="background-color: #F9FAFB; border-bottom: 1px solid #E5E7EB;">
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Imagen</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Nombre</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Precio</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Stock</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Estado</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr style="border-bottom: 1px solid #F3F4F6;">
                                <td class="px-4 py-3">
                                    @if($product->image_url)
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                            class="w-12 h-12 object-cover rounded-lg">
                                    @else
                                        <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background:#F3F4F6;">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#9CA3AF">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-medium" style="color:#111827;">{{ $product->name }}</td>
                                <td class="px-4 py-3" style="color:#111827;">${{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-3" style="color:#111827;">{{ $product->stock }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium"
                                        style="{{ $product->active ? 'background-color:#D1FAE5; color:#065F46;' : 'background-color:#FEE2E2; color:#991B1B;' }}">
                                        {{ $product->active ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        {{-- Editar --}}
                                        <a href="/products/{{ $product->id }}/edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#2563EB">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        {{-- Activar/Desactivar --}}
                                        <button wire:click="toggleActive({{ $product->id }})"
                                            title="{{ $product->active ? 'Desactivar' : 'Activar' }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="{{ $product->active ? '#F59E0B' : '#10B981' }}">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                        {{-- Eliminar --}}
                                        <button wire:click="delete({{ $product->id }})"
                                            wire:confirm="¿Estás segura de eliminar este producto?"
                                            title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="#EF4444">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </main>
    </div>
</div>
