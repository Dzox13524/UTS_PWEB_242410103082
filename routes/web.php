<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/loginAuth', [PageController::class, 'loginAuth'])->name('loginAuth');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

