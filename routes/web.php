<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapperController;
use App\Http\Controllers\UserController;

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

Route::get('/cadastrar', function () {
    return view('auth.cadastro');
});

Route::controller(UserController::class)->group(function(){
    Route::post('/cadastrar', 'store')->name('cadastro');
    Route::get('/', 'index')->name('login.index');
    Route::post('/login', 'login')->name('login.login');
});

Route::controller(ScrapperController::class)->group(function () {
    Route::get('/home', 'scrapper')->name('home.logado');
    Route::get('/url', 'scrapeDaily')->name('daily');
});
