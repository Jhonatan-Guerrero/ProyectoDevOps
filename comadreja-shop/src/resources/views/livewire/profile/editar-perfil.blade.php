<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">
    @include('partials.navbar')
    <div class="flex">
        @if(auth()->user()->role === 'vendedor')
            @include('partials.sidebar-vendedor')
        @else
            @include('partials.sidebar-comprador')
        @endif
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
                            <input wire:model="name" type="text" class="w-full px-3 py-2 text-sm outline-none" style="border:1px solid #B9EBD7; background:#F9FAFB; color:#111827; border-radius:10px;">
                            @error('name') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color:#111827;">Nueva contrasena <span style="color:#6B7280; font-weight:400;">(opcional)</span></label>
                            <input wire:model="password" type="password" placeholder="Minimo 8 caracteres" class="w-full px-3 py-2 text-sm outline-none" style="border:1px solid #B9EBD7; background:#F9FAFB; color:#111827; border-radius:10px;">
                            @error('password') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" style="color:#111827;">Confirmar contrasena</label>
                            <input wire:model="password_confirmation" type="password" placeholder="Repite tu contrasena" class="w-full px-3 py-2 text-sm outline-none" style="border:1px solid #B9EBD7; background:#F9FAFB; color:#111827; border-radius:10px;">
                        </div>
                        <div class="flex gap-3 pt-2">
                            <a href="/profile" class="px-5 py-2 text-sm rounded-lg" style="border:1px solid #D1D5DB; color:#111827;">Cancelar</a>
                            <button type="submit" class="px-5 py-2 text-white text-sm rounded-lg" style="background-color:#2563EB;">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
