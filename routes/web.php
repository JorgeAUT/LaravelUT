<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta protegida - solo usuarios autenticados
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Ruta solo para ADMIN
Route::get('/admin', function () {
    return view('admin.panel');
})->middleware(['auth', 'role:admin'])->name('admin.panel');

// Ruta solo para AGENTE
Route::get('/agente', function () {
    return view('agente.panel');
})->middleware(['auth', 'role:agente'])->name('agente.panel');

// Ruta para ADMIN, AGENTE y CLIENTE (todos los roles)
Route::get('/perfil', function () {
    return view('perfil');
})->middleware(['auth', 'role:admin,agente,cliente'])->name('perfil');