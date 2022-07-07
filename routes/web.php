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
Route::get('/aplicativos/create', [AplicativoController::class, 'create']);

// Rotas para Login
Route::get('/login', [UserController::class, 'login'])->name('login.page');
Route::post('/auth', [UserController::class, 'auth'])->name('auth.user');

Route::post('/aplicativos', [AplicativoController::class, 'store']);
