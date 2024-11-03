<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RdoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login'); // Exibe o formulário
});

Route::middleware(['auth'])->group(function() {
    Auth::routes(); //protege todas as rotas

    Route::resource('users', UserController::class);

    Route::post('/rdo/gerar', [RdoController::class, 'gerarRdo']); // Processa o formulário

    Route::get('/rdo', [RdoController::class, 'rdo'])->name('rdo');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});