<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('pages.auth.login');
})->middleware(['guest']);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/change-profile-avatar', [DashboardController::class, 'changeAvatar'])->name('change-profile-avatar');
    Route::delete('/remove-profile-avatar', [DashboardController::class, 'removeAvatar'])->name('remove-profile-avatar');

    Route::middleware(['can:admin'])->group(function() {
        Route::resource('user', UserController::class);
        Route::resource('rapat', RapatController::class);
        Route::resource('laporan', LaporanController::class);
        Route::put('updateOpsi/{id}', [RapatController::class, 'updateOpsi'])->name('updateOpsi');
    });
});
