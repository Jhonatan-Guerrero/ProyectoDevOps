<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    protected array $messages = [
        'email.required'    => 'El correo es obligatorio.',
        'email.email'       => 'Ingresa un correo válido.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min'      => 'La contraseña debe tener al menos 8 caracteres.',
    ];

    public function login(): void
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', 'Las credenciales no coinciden con nuestros registros.');
            return;
        }

        session()->regenerate();

        $this->redirect(route('dashboard'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.guest');
    }
}
