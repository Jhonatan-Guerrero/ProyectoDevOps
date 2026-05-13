<?php

namespace App\Livewire\Pedidos;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetallePedido extends Component
{
    public Order $pedido;
    public string $status = '';

    public function mount(Order $pedido): void
    {
        $this->pedido = $pedido;
        $this->status = $pedido->status;
    }

    public function actualizarEstado(): void
    {
        $this->pedido->update(['status' => $this->status]);
        session()->flash('success', 'Estado del pedido actualizado correctamente.');
    }

    public function render()
    {
        return view('livewire.pedidos.detalle-pedido')
            ->layout('layouts.guest');
    }
}
