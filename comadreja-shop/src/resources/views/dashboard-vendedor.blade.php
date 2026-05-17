<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Comadreja Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @livewireStyles
</head>
<body style="font-family: 'Inter', sans-serif; background-color: #F9FAFB;">

    @include('partials.navbar')

    <div class="flex">
        @include('partials.sidebar-vendedor')

        <main class="flex-1 p-8">
            <h2 class="text-xl font-bold mb-6" style="color:#111827;">
                Bienvenido, {{ auth()->user()->name }}
            </h2>

            {{-- Tarjetas de métricas --}}
            <div class="grid grid-cols-2 gap-6 mb-8">

                {{-- Total Productos --}}
                <div class="bg-white rounded-xl p-6 flex items-center gap-4" style="border:1px solid #E5E7EB;">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background-color:#F0FAF6;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="#0F6B3A">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7H4a2 2 0 00-2 2v6a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2zM16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm" style="color:#6B7280;">Total Productos</p>
                        <p class="text-3xl font-bold" style="color:#111827;">
                            {{ auth()->user()->products()->count() }}
                        </p>
                        <a href="/products" class="text-xs" style="color:#2563EB;">Ver mis productos →</a>
                    </div>
                </div>

                {{-- Total Pedidos --}}
                <div class="bg-white rounded-xl p-6 flex items-center gap-4" style="border:1px solid #E5E7EB;">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center" style="background-color:#DBEAFE;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="#1E40AF">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13M10 21a1 1 0 1 0 2 0M17 21a1 1 0 1 0 2 0"/>
                        </svg>
                    </div>
                    <div>
                        @php
                            $productosVendedor = auth()->user()->products()->pluck('id');
                            $totalPedidos = \App\Models\Order::whereHas('items', function($q) use ($productosVendedor) {
                                $q->whereIn('product_id', $productosVendedor);
                            })->count();
                        @endphp
                        <p class="text-sm" style="color:#6B7280;">Total Pedidos</p>
                        <p class="text-3xl font-bold" style="color:#111827;">{{ $totalPedidos }}</p>
                        <a href="/vendor/orders" class="text-xs" style="color:#2563EB;">Ver pedidos →</a>
                    </div>
                </div>
            </div>

            {{-- Resumen --}}
            <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                <h3 class="font-bold mb-4" style="color:#111827;">Resumen</h3>
                <p class="text-sm" style="color:#6B7280;">
                    Aqui puedes gestionar tus productos y pedidos. Usa el menu lateral para navegar entre las diferentes secciones.
                </p>
                <div class="flex gap-3 mt-4">
                    <a href="/products/create" class="px-4 py-2 text-white text-sm rounded-lg" style="background-color:#2563EB;">
                        + Crear producto
                    </a>
                    <a href="/vendor/orders" class="px-4 py-2 text-sm rounded-lg" style="border:1px solid #D1D5DB; color:#111827;">
                        Ver pedidos
                    </a>
                </div>
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>
