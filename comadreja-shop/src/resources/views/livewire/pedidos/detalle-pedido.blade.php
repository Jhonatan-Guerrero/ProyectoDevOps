<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    @include('partials.navbar') <div style="display:none">
        <h1 class="text-lg font-bold" style="color: #111827;">Comadreja Shop</h1>
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

    <div class="flex">
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
                    <a href="/products" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm" style="color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        Mis Productos
                    </a>
                </li>
                <li>
                    <a href="/vendor/orders" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium" style="background-color:#F0FAF6; color:#111827;">
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

            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 text-sm mb-6" style="color:#6B7280;">
                <a href="/vendor/orders" style="color:#2563EB;">Pedidos</a>
                <span>/</span>
                <span>ORD-{{ $pedido->id }}</span>
            </div>

            @if (session()->has('success'))
                <div class="mb-4 px-4 py-3 rounded-lg text-sm" style="background-color: #B9EBD7; color: #111827;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-2 gap-6">

                {{-- Info del pedido --}}
                <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                    <h3 class="font-bold mb-4" style="color:#111827;">Informacion del Pedido</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span style="color:#6B7280;">Numero de pedido</span>
                            <span class="font-medium" style="color:#111827;">ORD-{{ $pedido->id }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span style="color:#6B7280;">Fecha</span>
                            <span style="color:#111827;">{{ $pedido->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span style="color:#6B7280;">Total</span>
                            <span class="font-bold" style="color:#111827;">${{ number_format($pedido->total, 2) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Datos del cliente --}}
                <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                    <h3 class="font-bold mb-4" style="color:#111827;">Datos del Cliente</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span style="color:#6B7280;">Nombre</span>
                            <span style="color:#111827;">{{ $pedido->user->name }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span style="color:#6B7280;">Destinatario</span>
                            <span style="color:#111827;">{{ $pedido->shipping_name }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span style="color:#6B7280;">Direccion</span>
                            <span style="color:#111827; text-align:right; max-width:200px;">{{ $pedido->shipping_address }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span style="color:#6B7280;">Telefono</span>
                            <span style="color:#111827;">{{ $pedido->shipping_phone }}</span>
                        </div>
                    </div>
                </div>

                {{-- Productos --}}
                <div class="bg-white rounded-xl p-6 col-span-2" style="border:1px solid #E5E7EB;">
                    <h3 class="font-bold mb-4" style="color:#111827;">Productos</h3>
                    <table class="w-full text-sm">
                        <thead>
                            <tr style="border-bottom:1px solid #E5E7EB;">
                                <th class="pb-2 text-left font-medium" style="color:#6B7280;">Producto</th>
                                <th class="pb-2 text-left font-medium" style="color:#6B7280;">Cantidad</th>
                                <th class="pb-2 text-left font-medium" style="color:#6B7280;">Precio unitario</th>
                                <th class="pb-2 text-left font-medium" style="color:#6B7280;">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedido->items as $item)
                            <tr style="border-bottom:1px solid #F3F4F6;">
                                <td class="py-3">
                                    <div class="flex items-center gap-3">
                                        @if($item->product->image_url)
                                            <img src="{{ $item->product->image_url }}" class="w-10 h-10 rounded-lg object-cover">
                                        @endif
                                        <span style="color:#111827;">{{ $item->product->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3" style="color:#111827;">{{ $item->quantity }}</td>
                                <td class="py-3" style="color:#111827;">${{ number_format($item->unit_price, 2) }}</td>
                                <td class="py-3 font-medium" style="color:#111827;">${{ number_format($item->unit_price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Actualizar estado --}}
                <div class="bg-white rounded-xl p-6 col-span-2" style="border:1px solid #E5E7EB;">
                    <h3 class="font-bold mb-4" style="color:#111827;">Actualizar Estado del Pedido</h3>
                    <div class="flex items-center gap-4">
                        <select wire:model="status"
                            class="px-3 py-2 text-sm outline-none"
                            style="border:1px solid #D1D5DB; border-radius:6px; color:#111827; min-width:200px;">
                            <option value="pendiente">Pendiente</option>
                            <option value="en_preparacion">En preparacion</option>
                            <option value="enviado">Enviado</option>
                            <option value="entregado">Entregado</option>
                        </select>
                        <button wire:click="actualizarEstado"
                            class="px-5 py-2 text-white text-sm rounded-lg"
                            style="background-color:#2563EB;">
                            Guardar cambios
                        </button>
                        <a href="/vendor/orders"
                            class="px-5 py-2 text-sm rounded-lg"
                            style="border:1px solid #D1D5DB; color:#111827;">
                            Volver
                        </a>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>
