<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\SistemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/il', [ApiController::class, 'getil']);
    Route::get('/ilce', [ApiController::class, 'getilce']);
    Route::get('/sistem', [ApiController::class, 'getsistem']);

    Route::group(['prefix'=>'sistem','as'=>'sistem.'],function (){
        Route::post('/store', [SistemController::class, 'store'])->name('store');
    });





});

