<?php

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

use Modules\WebContent\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::group(['middleware' =>['web']], function () {
    //route home
    Route::get('/', [PublicController::class, 'index'])->name('home');
    Route::post('contact-submit', [PublicController::class, 'contactSubmit'])->name('contact.submit');

    //login
    Route::get('login', [AuthenticatedSessionController::class, 'index'])->name('login');
    Route::post('login-store', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    //register
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register-store', [RegisteredUserController::class, 'store'])->name('register.store');
});
