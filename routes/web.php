<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\PaginaController;
use App\Models\Conta;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaginaController::class, 'login']);

Route::get('auth/login', [PaginaController::class, 'login'])->name('login');

Route::get('auth/register', [PaginaController::class, 'register'])->name('register');

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');

Route::middleware('auth')->group(function () {
    Route::get('site/home', [PaginaController::class, 'home'])->name('site.home');
    Route::get('site/saldo', [PaginaController::class, 'saldo'])->name('site.saldo');
    Route::get('site/extrato', [PaginaController::class, 'extrato'])->name('site.extrato');
    Route::get('site/deposito', [PaginaController::class, 'deposito'])->name('site.deposito');
    Route::get('site/saque', [PaginaController::class, 'saque'])->name('site.saque');

    Route::post('update/deposito', [ContaController::class, 'deposito'])->name('update.deposito');
    Route::post('update/saque', [ContaController::class, 'saque'])->name('update.saque');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
