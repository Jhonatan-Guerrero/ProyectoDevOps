<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('logout');

use App\Livewire\Profile\EditProfile;

Route::get('/profile', EditProfile::class)->middleware('auth')->name('profile');
