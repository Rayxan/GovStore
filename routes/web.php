<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AplicativoController;
use App\Http\Controllers\UserController;

// Rota da página inicial
Route::get('/', [AplicativoController::class, 'index']);

// Rotas para edição de perfil
Route::get('/user/edit-perfil/{id}', [UserController::class, 'editPerfil'])->middleware('auth');
Route::put('/user/update-perfil/{id}', [UserController::class, 'updatePerfil'])->middleware('auth');

// Rotas para criação, leitura, atualização e exclusão de um aplicativo
Route::get('/aplicativos/create', [AplicativoController::class, 'create'])->middleware('auth');
Route::get('/aplicativos/{id}', [AplicativoController::class, 'show']);
Route::post('/aplicativos', [AplicativoController::class, 'store']);
Route::delete('aplicativos/{id}', [AplicativoController::class, 'destroy'])->middleware('auth');
Route::get('/aplicativos/edit/{id}', [AplicativoController::class, 'edit'])->middleware('auth');
Route::put('/aplicativos/update/{id}', [AplicativoController::class, 'update'])->middleware('auth');
Route::post('/aplicativos/solicitar-excluir/{id}', [AplicativoController::class, 'aparecerExcluir'])->middleware('auth');

// Rota para a página que lista os aplicativos
Route::get('/dashboard', [AplicativoController::class, 'dashboard'])->middleware('auth');