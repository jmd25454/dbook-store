<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ViaCepController;

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
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', BookController::class);
    Route::get('/home', BookController::class);
    Route::get('/dashboard', BookController::class)->name('dashboard');
    Route::get('/favorites', [BookController::class, 'favorites'])->name('favorites');
    Route::get('/favorites/{bookId}', [BookController::class, 'addFavoriteBook'])->name('addFavorite');
    Route::get('/favorites/remove/{bookId}', [BookController::class, 'removeFavoriteBook'])->name('removeFavorite');
});
