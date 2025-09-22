<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProblemaController;
use App\Http\Controllers\AcoesController;



Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class , 'formLogin'])->name('login');
    Route::get('/cadastro', [AuthController::class, 'formCadastro'])->name('cadastro.form');
    Route::post('/cadastro', [AuthController::class, 'cadastrarUsuario'])->name('cadastro.submit');
    Route::post('/login', [AuthController::class , 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function(){
    Route::get ('/', [HomeController::class, 'index'])->name('home');
    Route::get('/problema/{problema}', [ProblemaController::class, 'show'])->name('problema.show');


    Route::get('/problema' , [ProblemaController::class, 'formProblema'])->name('problema.form');
    Route::post('/problema', [ProblemaController::class, 'cadastrar'])->name('problema.submit');

    Route::get('/problema/{problema}/editar', [ProblemaController::class, 'editar'])->name('problema.editar');
    Route::put('/problema/{problema}', [ProblemaController::class, 'atualizar'])->name('problema.atualizar');

    Route::delete('/problema/{problema}', [ProblemaController::class, 'excluir'])->name('problema.excluir');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.submit');

    Route::post('/problema/{problema}/acoes', [AcoesController::class, 'cadastrar'])->name('acoes.submit');
    
});

