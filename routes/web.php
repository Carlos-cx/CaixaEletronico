<?php

use App\Http\Controllers\PaginaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaginaController::class, 'login'])->name('login');

Route::get('/home', [PaginaController::class, 'home'])->name('home');

//temporario
Route::get('/layout/estrutura', [PaginaController::class, 'estrutura'])->name('layout/estrutura');
