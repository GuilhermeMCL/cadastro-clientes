<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ClienteController;

Route::resource('clientes', ClienteController::class)->middleware('auth');

Auth::routes();

