<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = 'comprador';

    protected function rules(): array
    {
        return [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:8|confirmed',
            'role'                  => 'required|in:comprador,vendedor',
        ];
    }

    protected array $messages = [
        'name.required'          => 'El nombre es obligatorio.',
        'email.required'         => 'El correo es obligatorio.',
        'email.email'            => 'Ingresa un correo válido.',
        'email.unique'           => 'Este correo ya está registrado.',
        'password.required'      => 'La contraseña es obligatoria.',
        'password.min'           => 'La contraseña debe tener al menos 8 caracteres.',
        'password.confirmed'     => 'Las contraseñas no coinciden.',
        'role.required'          => 'Selecciona un rol.',
        'role.in'                => 'El rol seleccionado no es válido.',
    ];

    public function register(): void
    {
        $this->validate();

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'role'     => $this->role,
            'active'   => true,
        ]);

        Auth::login($user);

        $this->redirect(route('dashboard'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.guest');
    }
}
