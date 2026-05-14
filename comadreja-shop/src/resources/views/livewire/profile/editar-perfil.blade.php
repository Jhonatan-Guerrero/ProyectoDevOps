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
            <div class="max-w-md">

                <div class="flex items-center gap-2 text-sm mb-6" style="color:#6B7280;">
                    <a href="/profile" style="color:#2563EB;">Mi Perfil</a>
                    <span>/</span>
                    <span>Editar</span>
                </div>

                <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                    <h3 class="font-bold text-lg mb-6" style="color:#111827;">Editar Perfil</h3>

                    @if (session()->has('success'))
                        <div class="mb-4 px-4 py-3 rounded-lg text-sm" style="background-color: #B9EBD7; color: #111827;">
                            ✓ {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit="save" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color:#111827;">Nombre completo</label>
                            <input wire:model="name" type="text"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border:1px solid #B9EBD7; background:#F9FAFB; color:#111827; border-radius:10px;">
                            @error('name') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color:#111827;">
                                Nueva contrasena <span style="color:#6B7280; font-weight:400;">(opcional)</span>
                            </label>
                            <input wire:model="password" type="password" placeholder="Minimo 8 caracteres"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border:1px solid #B9EBD7; background:#F9FAFB; color:#111827; border-radius:10px;">
                            @error('password') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color:#111827;">Confirmar contrasena</label>
                            <input wire:model="password_confirmation" type="password" placeholder="Repite tu contrasena"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border:1px solid #B9EBD7; background:#F9FAFB; color:#111827; border-radius:10px;">
                        </div>
                        <div class="flex gap-3 pt-2">
                            <a href="/profile" class="px-5 py-2 text-sm rounded-lg" style="border:1px solid #D1D5DB; color:#111827;">
                                Cancelar
                            </a>
                            <button type="submit" class="px-5 py-2 text-white text-sm rounded-lg" style="background-color:#2563EB;">
                                Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
