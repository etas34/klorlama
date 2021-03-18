<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SistemController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('dashboard');
});



require __DIR__ . '/auth.php';

Auth::routes();
Route::get('/reset', function (){
    Artisan::call('config:cache');

    Artisan::call('cache:clear');

});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::get('/destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::post('/edit/{user}', [UserController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'sistem', 'as' => 'sistem.'], function () {
        Route::get('/', [SistemController::class, 'index'])->name('index');
        Route::get('/create', [SistemController::class, 'create'])->name('create');
        Route::get('/edit/{sistem}', [SistemController::class, 'edit'])->name('edit');
        Route::get('/show/{sistem}', [SistemController::class, 'show'])->name('show');
        Route::get('/destroy/{sistem}', [SistemController::class, 'destroy'])->name('destroy');
        Route::post('/edit/{sistem}', [SistemController::class, 'update'])->name('update');

    });



    Route::get('/tokens/create/{token_name}', function ($token_name) {
        $token = Auth::user()->createToken($token_name);

        return [
            'token' => $token->plainTextToken,
            '__desc' =>"Bu tokeni kaydet, sana bu tokeni ilk ve son göstermemiz olacak"
        ];
    });

});
