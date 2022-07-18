<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AplicativoController;
use App\Http\Controllers\UserController;

Route::get('/', [AplicativoController::class, 'index']);


Route::get('/aplicativos/create', [AplicativoController::class, 'create'])->middleware('auth');
Route::get('/aplicativos/{id}', [AplicativoController::class, 'show']);
Route::post('/aplicativos', [AplicativoController::class, 'store']);
Route::delete('aplicativos/{id}', [AplicativoController::class, 'destroy'])->middleware('auth');
Route::get('/aplicativos/edit/{id}', [AplicativoController::class, 'edit'])->middleware('auth');
Route::put('/aplicativos/update/{id}', [AplicativoController::class, 'update'])->middleware('auth');

Route::get('/user/edit-perfil/{id}', [UserController::class, 'editPerfil'])->middleware('auth');
Route::put('/user/update-perfil/{id}', [UserController::class, 'updatePerfil'])->middleware('auth');

Route::post('/aplicativos/solicitar-excluir/{id}', [AplicativoController::class, 'aparecerExcluir'])->middleware('auth');


Route::get('/dashboard', [AplicativoController::class, 'dashboard'])->middleware('auth');