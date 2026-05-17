<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    @include('partials.navbar')

    <div class="flex">
        @include('partials.sidebar-vendedor')

        <main class="flex-1 p-8">
            <h2 class="text-xl font-bold mb-6" style="color:#111827;">Pedidos Recibidos</h2>

            @if($pedidos->isEmpty())
                <div class="text-center py-16 bg-white rounded-xl" style="border:1px solid #E5E7EB;">
                    <p class="text-lg font-medium mb-2" style="color:#111827;">Aun no tienes pedidos recibidos</p>
                    <p class="text-sm" style="color:#6B7280;">Cuando un comprador adquiera tus productos apareceran aqui</p>
                </div>
            @else
                <div class="bg-white rounded-xl overflow-hidden" style="border:1px solid #E5E7EB;">
                    <table class="w-full text-sm">
                        <thead>
                            <tr style="background-color:#F9FAFB; border-bottom:1px solid #E5E7EB;">
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Pedido</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Cliente</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Fecha</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Total</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Estado</th>
                                <th class="px-4 py-3 text-left font-medium" style="color:#6B7280;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                            <tr style="border-bottom:1px solid #F3F4F6;">
                                <td class="px-4 py-3 font-medium" style="color:#111827;">ORD-{{ $pedido->id }}</td>
                                <td class="px-4 py-3" style="color:#111827;">{{ $pedido->user->name }}</td>
                                <td class="px-4 py-3" style="color:#6B7280;">{{ $pedido->created_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 font-medium" style="color:#111827;">${{ number_format($pedido->total, 2) }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium"
                                        style="@if($pedido->status == 'pendiente') background-color:#FEF3C7; color:#92400E; @elseif($pedido->status == 'en_preparacion') background-color:#DBEAFE; color:#1E40AF; @elseif($pedido->status == 'enviado') background-color:#E0E7FF; color:#3730A3; @else background-color:#D1FAE5; color:#065F46; @endif">
                                        {{ ucfirst(str_replace('_', ' ', $pedido->status)) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <a href="/vendor/orders/{{ $pedido->id }}" class="px-3 py-1 text-white text-xs rounded-lg" style="background-color:#2563EB;">
                                        Ver detalle
                                    </a>
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
