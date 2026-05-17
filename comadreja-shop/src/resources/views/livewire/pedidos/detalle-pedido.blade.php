<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    @include('partials.navbar')

    <div class="flex">
        @include('partials.sidebar-vendedor')

        <main class="flex-1 p-8">
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
                            <span style="color:#111827;">{{ $pedido->shipping_address }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span style="color:#6B7280;">Telefono</span>
                            <span style="color:#111827;">{{ $pedido->shipping_phone }}</span>
                        </div>
                    </div>
                </div>

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

                <div class="bg-white rounded-xl p-6 col-span-2" style="border:1px solid #E5E7EB;">
                    <h3 class="font-bold mb-4" style="color:#111827;">Actualizar Estado</h3>
                    <div class="flex items-center gap-4">
                        <select wire:model="status" class="px-3 py-2 text-sm outline-none" style="border:1px solid #D1D5DB; border-radius:6px; color:#111827; min-width:200px;">
                            <option value="pendiente">Pendiente</option>
                            <option value="en_preparacion">En preparacion</option>
                            <option value="enviado">Enviado</option>
                            <option value="entregado">Entregado</option>
                        </select>
                        <button wire:click="actualizarEstado" class="px-5 py-2 text-white text-sm rounded-lg" style="background-color:#2563EB;">
                            Guardar cambios
                        </button>
                        <a href="/vendor/orders" class="px-5 py-2 text-sm rounded-lg" style="border:1px solid #D1D5DB; color:#111827;">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
