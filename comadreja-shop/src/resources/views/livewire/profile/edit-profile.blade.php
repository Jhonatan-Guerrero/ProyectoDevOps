<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    {{-- Navbar --}}
    <nav class="w-full px-6 py-3 flex justify-between items-center" style="background-color: #B9EBD7;">
        <h1 class="text-lg font-bold" style="color: #111827;">Comadreja Shop</h1>
        <div class="flex items-center gap-3" style="flex:1; margin: 0 24px;">
            <div class="flex items-center w-full max-w-md" style="background:white; border-radius:10px; border:1px solid #9DD4C0; padding: 6px 12px;">
                <input type="text" placeholder="Buscar productos..."
                    class="outline-none text-sm w-full" style="color:#111827; background:transparent;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="#6B7280">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
            </div>
        </div>
        <div class="flex items-center gap-4">
            {{-- Carrito --}}
            <a href="/cart" style="color:#111827;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13M7 13L5.4 5M10 21a1 1 0 1 0 2 0M17 21a1 1 0 1 0 2 0"/>
                </svg>
            </a>
            {{-- Usuario --}}
            <a href="/profile" style="color:#111827;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </a>
            <span class="text-sm font-medium" style="color:#111827;">{{ auth()->user()->name }}</span>
            {{-- Cerrar sesión --}}
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" style="color:#111827;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </nav>

    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-52 min-h-screen pt-6 px-3" style="background-color: white; border-right: 1px solid #B9EBD7;">
            <ul class="space-y-1">
                <li>
                    <a href="/orders" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm" style="color:#111827;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13M7 13L5.4 5M10 21a1 1 0 1 0 2 0M17 21a1 1 0 1 0 2 0"/>
                        </svg>
                        Mis Pedidos
                    </a>
                </li>
                <li>
                    <a href="/profile" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium" style="background-color:#F0FAF6; color:#111827; border-radius:10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Mi perfil
                    </a>
                </li>
            </ul>
        </aside>

        {{-- Contenido --}}
        <main class="flex-1 flex items-start justify-center pt-10 px-8">
            <div class="w-full max-w-lg bg-white rounded-xl shadow-sm p-8" style="border: 1px solid #B9EBD7;">

                <h2 class="text-2xl font-bold mb-6" style="color: #111827;">Editar Perfil</h2>

                @if (session()->has('success'))
                    <div class="mb-4 px-4 py-3 rounded-lg text-sm" style="background-color: #B9EBD7; color: #111827; border-radius: 10px;">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                <form wire:submit="save" class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #111827;">Nombre</label>
                        <input wire:model="name" type="text" placeholder="Tu nombre completo"
                            class="w-full px-4 py-2 text-sm outline-none"
                            style="border: 1px solid #B9EBD7; background: #F9FAFB; color: #111827; border-radius: 10px;">
                        @error('name') <p class="text-xs mt-1" style="color: #EF4444;">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #111827;">
                            Nueva contraseña <span style="color:#6B7280; font-weight:400;">(opcional)</span>
                        </label>
                        <input wire:model="password" type="password" placeholder="Mínimo 8 caracteres"
                            class="w-full px-4 py-2 text-sm outline-none"
                            style="border: 1px solid #B9EBD7; background: #F9FAFB; color: #111827; border-radius: 10px;">
                        @error('password') <p class="text-xs mt-1" style="color: #EF4444;">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1" style="color: #111827;">Confirmar contraseña</label>
                        <input wire:model="password_confirmation" type="password" placeholder="Repite tu contraseña"
                            class="w-full px-4 py-2 text-sm outline-none"
                            style="border: 1px solid #B9EBD7; background: #F9FAFB; color: #111827; border-radius: 10px;">
                    </div>

                    <button type="submit"
                        class="px-6 py-2 text-white font-semibold text-sm transition hover:opacity-90"
                        style="background-color: #2563EB; border-radius: 10px;">
                        Guardar
                    </button>
                </form>
            </div>
        </main>
    </div>
</div>
