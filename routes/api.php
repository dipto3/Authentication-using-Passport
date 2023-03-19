<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/store', [HomeController::class, 'store']);

Route::post('/c-store', [HomeController::class, 'c_store']);

Route::post('/p-store', [HomeController::class, 'p_store']);
Route::get('/show', [HomeController::class, 'show']);

Route::post('/register', [HomeController::class, 'register']);
Route::post('/login', [HomeController::class, 'login']);

