<div class="min-h-screen" style="background-color: #F9FAFB; font-family: 'Inter', sans-serif;">

    @include('partials.navbar')

    <main class="max-w-4xl mx-auto px-8 py-10">
        <h2 class="text-2xl font-bold mb-6" style="color:#111827;">Checkout</h2>

        <div class="flex items-center gap-4 mb-8">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold"
                    style="{{ $step == 1 ? 'background-color:#2563EB; color:white;' : 'background-color:#B9EBD7; color:#111827;' }}">1</div>
                <span class="text-sm font-medium" style="color:#111827;">Datos de envio</span>
            </div>
            <div style="flex:1; height:1px; background:#E5E7EB;"></div>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold"
                    style="{{ $step == 2 ? 'background-color:#2563EB; color:white;' : 'background-color:#E5E7EB; color:#6B7280;' }}">2</div>
                <span class="text-sm" style="color:#{{ $step == 2 ? '111827' : '6B7280' }};">Informacion de pago</span>
            </div>
        </div>

        <div class="flex gap-6">
            <div class="flex-1">
                @if($step == 1)
                <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                    <h3 class="font-bold mb-4" style="color:#111827;">Informacion de Envio</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm mb-1" style="color:#111827;">Nombre del destinatario</label>
                            <input wire:model="shipping_name" type="text" placeholder="Nombre completo"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                            @error('shipping_name') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm mb-1" style="color:#111827;">Direccion completa</label>
                            <input wire:model="shipping_address" type="text" placeholder="Calle, numero, colonia, ciudad"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                            @error('shipping_address') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm mb-1" style="color:#111827;">Telefono</label>
                            <input wire:model="shipping_phone" type="text" placeholder="Numero de contacto"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                            @error('shipping_phone') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex gap-3 pt-2">
                            <a href="/cart" class="px-5 py-2 text-sm" style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                                Volver al carrito
                            </a>
                            <button wire:click="nextStep" class="px-5 py-2 text-white text-sm" style="background-color:#2563EB; border-radius:6px;">
                                Continuar
                            </button>
                        </div>
                    </div>
                </div>
                @endif

                @if($step == 2)
                <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                    <h3 class="font-bold mb-4" style="color:#111827;">Informacion de Pago</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm mb-1" style="color:#111827;">Numero de tarjeta</label>
                            <input wire:model="card_number" type="text" placeholder="1234567890123456" maxlength="16"
                                class="w-full px-3 py-2 text-sm outline-none"
                                style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                            @error('card_number') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-1">
                                <label class="block text-sm mb-1" style="color:#111827;">Fecha de vencimiento</label>
                                <input wire:model="card_expiry" type="text" placeholder="MM/AA"
                                    class="w-full px-3 py-2 text-sm outline-none"
                                    style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                                @error('card_expiry') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm mb-1" style="color:#111827;">CVV</label>
                                <input wire:model="card_cvv" type="text" placeholder="123" maxlength="4"
                                    class="w-full px-3 py-2 text-sm outline-none"
                                    style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                                @error('card_cvv') <p class="text-xs mt-1" style="color:#EF4444;">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="flex gap-3 pt-2">
                            <button wire:click="$set('step', 1)" class="px-5 py-2 text-sm" style="border:1px solid #D1D5DB; border-radius:6px; color:#111827;">
                                Volver
                            </button>
                            <button wire:click="placeOrder" class="px-5 py-2 text-white text-sm" style="background-color:#2563EB; border-radius:6px;">
                                Confirmar Compra
                            </button>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="w-72 flex-shrink-0">
                <div class="bg-white rounded-xl p-6" style="border:1px solid #E5E7EB;">
                    <h3 class="font-bold mb-4" style="color:#111827;">Resumen de compra</h3>
                    @foreach($items as $item)
                    <div class="flex justify-between text-sm mb-2" style="color:#6B7280;">
                        <span>{{ $item->product->name }} x{{ $item->quantity }}</span>
                        <span>${{ number_format($item->product->price * $item->quantity, 2) }}</span>
                    </div>
                    @endforeach
                    <div class="border-t my-3" style="border-color:#E5E7EB;"></div>
                    <div class="flex justify-between font-bold" style="color:#111827;">
                        <span>Total</span>
                        <span>${{ number_format($total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
