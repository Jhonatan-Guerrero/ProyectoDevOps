<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    @include('partials.navbar')

    <div class="flex">
        <aside class="w-52 min-h-screen pt-4 px-2" style="background-color: white; border-right: 1px solid #E5E7EB;">
            <ul class="space-y-1">
                <li>
                    <a href="/orders" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm" style="color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Mis Pedidos
                    </a>
                </li>
                <li>
                    <a href="/profile" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium" style="background-color:#F0FAF6; color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Mi Perfil
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 p-8">
            <div class="max-w-2xl space-y-6">

                <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-bold text-lg" style="color:#111827;">Mi Perfil</h3>
                        <a href="/profile/edit" class="px-4 py-2 text-white text-sm rounded-lg" style="background-color:#2563EB;">
                            Editar perfil
                        </a>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold"
                            style="background-color:#B9EBD7; color:#0F6B3A;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="space-y-1">
                            <p class="font-bold text-lg" style="color:#111827;">{{ auth()->user()->name }}</p>
                            <p class="text-sm" style="color:#6B7280;">{{ auth()->user()->email }}</p>
                            <span class="text-xs px-2 py-1 rounded-full" style="background-color:#B9EBD7; color:#0F6B3A;">
                                {{ ucfirst(auth()->user()->role) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold" style="color:#111827;">Pedidos Recientes</h3>
                        <a href="/orders" class="text-sm" style="color:#2563EB;">Ver todos</a>
                    </div>

                    @if($pedidos->isEmpty())
                        <div class="text-center py-8">
                            <p class="text-sm" style="color:#6B7280;">Aun no tienes pedidos</p>
                            <a href="/catalog" class="text-sm mt-2 inline-block" style="color:#2563EB;">Ir al catalogo</a>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach($pedidos as $pedido)
                            <div class="p-3 rounded-lg" style="border:1px solid #F3F4F6;">
                                <div class="flex items-center justify-between mb-1">
                                    <p class="text-sm font-medium" style="color:#111827;">Pedido #ORD-{{ $pedido->id }}</p>
                                    <span class="text-xs px-2 py-1 rounded-full"
                                        style="
                                        @if($pedido->status == 'pendiente') background-color:#FEF3C7; color:#92400E;
                                        @elseif($pedido->status == 'en_preparacion') background-color:#DBEAFE; color:#1E40AF;
                                        @elseif($pedido->status == 'enviado') background-color:#E0E7FF; color:#3730A3;
                                        @else background-color:#D1FAE5; color:#065F46;
                                        @endif
                                        ">
                                        {{ ucfirst(str_replace('_', ' ', $pedido->status)) }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-xs" style="color:#6B7280;">{{ $pedido->created_at->format('d/m/Y') }}</p>
                                    <p class="text-sm font-bold" style="color:#111827;">${{ number_format($pedido->total, 2) }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </main>
    </div>
</div>
