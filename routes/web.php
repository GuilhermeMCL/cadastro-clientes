<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ClienteController;

Route::resource('clientes', ClienteController::class);
Route::post('/cep', [ClienteController::class, 'buscarEndereco']);




Auth::routes();

