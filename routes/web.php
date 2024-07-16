<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\CommonMark\Parser\Inline\AutolinkParser;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register/submit', [AuthController::class, 'register_submit'])->name('register_submit');

Route::post('/login/submit', [AuthController::class, 'login_submit'])->name('login_submit');


Route::group(['Middleware' => 'admin'], function () {

    Route::get('/', [AuthController::class, 'welcome'])->name('welcome');

    Route::resource('products', ProductController::class);
});

Route::group(['Middleware' => 'seller'], function () {
});
