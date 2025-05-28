<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaginaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaginaController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('login.auth');

Route::get('/home', [PaginaController::class, 'home'])->name('home');

//temporario
Route::get('/layout/estrutura', [PaginaController::class, 'estrutura'])->name('layout/estrutura');
