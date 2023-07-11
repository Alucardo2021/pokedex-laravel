<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PokemonController::class, 'index']);
Route::get('/pokemon/{pokemon:PokemonID}', [PokemonController::class, 'show']);
Route::get('/crud', [PokemonController::class, 'crud']);


Route::post('/borrar', [PokemonController::class, 'borrarMovimiento']);





