<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoGameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [UserController::class , 'register']);
Route::post('login', [UserController::class , 'authenticate']);

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('user', [UserController::class, 'getAuthenticatedUser']);
    Route::post('registrarVideojuego', [VideoGameController::class, 'registrarVideojuego']);
    Route::post('consultarVideojuegos', [VideoGameController::class, 'consultarVideojuegos']);
    Route::post('obtenerVideojuego', [VideoGameController::class, 'obtenerVideojuego']);
    Route::post('eliminarVideojuego', [VideoGameController::class, 'eliminarVideojuego']);
    Route::post('editarVideoJuego', [VideoGameController::class, 'editarVideoJuego']);
});