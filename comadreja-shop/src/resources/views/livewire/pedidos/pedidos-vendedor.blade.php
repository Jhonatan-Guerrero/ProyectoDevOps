<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    <nav class="w-full px-6 py-3 flex items-center justify-between" style="background-color: #B9EBD7;">
        <h1 class="text-lg font-bold" style="color: #111827;">Comadreja Shop</h1>
        <div class="flex-1 mx-6">
            <div class="flex items-center" style="background:white; border-radius:10px; border:1px solid #9DD4C0; padding: 6px 14px; max-width: 400px;">
                <input type="text" placeholder="Buscar productos..." class="outline-none text-sm w-full" style="color:#111827; background:transparent;">
            </div>
        </div>
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
                                        style="
                                        @if($pedido->status == 'pendiente') background-color:#FEF3C7; color:#92400E;
                                        @elseif($pedido->status == 'en_preparacion') background-color:#DBEAFE; color:#1E40AF;
                                        @elseif($pedido->status == 'enviado') background-color:#E0E7FF; color:#3730A3;
                                        @else background-color:#D1FAE5; color:#065F46;
                                        @endif
                                        ">
                                        {{ ucfirst(str_replace('_', ' ', $pedido->status)) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <a href="/vendor/orders/{{ $pedido->id }}"
                                        class="px-3 py-1 text-white text-xs rounded-lg"
                                        style="background-color:#2563EB;">
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
