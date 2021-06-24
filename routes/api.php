<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UserController;

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

Route::get('/persons', [PersonController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/persons', [PersonController::class, 'store']);
    Route::post('/create-token', [UserController::class, 'createToken']);
});
