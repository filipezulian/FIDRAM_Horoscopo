<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapperController;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/cadastro', function () {
    return view('auth.cadastro');
});

Route::controller(ScrapperController::class)->group(function () {
    Route::get('/home', 'scrapper')->name('scrapper');
});
