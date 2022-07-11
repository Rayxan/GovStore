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

Route::get('/', [AplicativoController::class, 'index']);

// Route::view('home', 'home')->middleware('auth');

Route::get('/aplicativos/create', [AplicativoController::class, 'create'])->middleware('auth');
Route::get('/aplicativos/{id}', [AplicativoController::class, 'show']);
Route::post('/aplicativos', [AplicativoController::class, 'store']);
Route::delete('aplicativos/{id}', [AplicativoController::class, 'destroy'])->middleware('auth');
Route::get('/aplicativos/edit/{id}', [AplicativoController::class, 'edit'])->middleware('auth');
Route::put('/aplicativos/update/{id}', [AplicativoController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [AplicativoController::class, 'dashboard'])->middleware('auth');

// Route::middleware(['admin'])->group (function(){
//     Route::get('/aplicativos/edit/{id}', [AplicativoController::class, 'edit'])->middleware('auth');
//     Route::put('/aplicativos/update/{id}', [AplicativoController::class, 'update'])->middleware('auth');
// });

// Route::middleware(['client'])->group (function(){
// });