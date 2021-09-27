<?php

use App\Http\Controllers\AuthController;
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

Route::view('login', 'pages.auth.login')->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::view('register', 'pages.auth.register')->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::view('lengkapi-profil', 'pages.user.lengkapi-profil')->name('lengkapi-profil');
    
    Route::put('user', [UserController::class, 'update'])->name('user');
    
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::middleware('profile-is-complete')->group(function () {
        Route::view('/', 'pages.index')->name('home');
        
        Route::get('users', [UserController::class, 'index'])->name('users');
        Route::get('user/{id}', [UserController::class, 'show'])->name('user-show');

        Route::put('ubah-foto', [UserController::class, 'ubahFoto'])->name('ubah-foto');

        Route::delete('hapus-akun', [UserController::class, 'destroy'])->name('hapus-akun');
    });
});
