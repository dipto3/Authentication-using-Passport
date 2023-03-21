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
Route::middleware('auth:api')->group(function(){
    // Route::post('/c-store', [HomeController::class, 'c_store']);
    // Route::get('/show-category/{id}', [HomeController::class, 'show_category']);
    // Route::post('/p-store', [HomeController::class, 'p_store']);
    // Route::get('/show-product/{id}', [HomeController::class, 'show_product']);
    
});
Route::post('/store', [HomeController::class, 'store']);




Route::get('/show', [HomeController::class, 'show']);

Route::post('/register', [HomeController::class, 'register']);
Route::post('/login', [HomeController::class, 'login']);


//
Route::post('/c-store', [HomeController::class, 'c_store']);
    Route::get('/show-category/{id}', [HomeController::class, 'show_category']);
    Route::post('/p-store', [HomeController::class, 'p_store']);
    Route::get('/show-product/{id}', [HomeController::class, 'show_product']);
