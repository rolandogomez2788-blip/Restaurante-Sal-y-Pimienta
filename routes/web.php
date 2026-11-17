<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PlatilloController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::resource('platillos', PlatilloController::class)->except('show');
Route::resource('categorias', CategoriaController::class)->only(['index', 'store', 'destroy']);