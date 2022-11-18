<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CekController;


use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::prefix('cek')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/status', [CekController::class, 'index'])->name('cek.status');
})->name('cek.*');

// Guest
Route::prefix('guest')->middleware(['auth', 'verified', 'role:guest'])->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('guest');
})->name('guest.*');

// Admin
Route::prefix('application')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('application.list');
    Route::get('/list', [ApplicationController::class, 'index'])->name('application.list');
    Route::get('/setting', [ApplicationController::class, 'index'])->name('application.setting');
})->name('application.*');

// Super Admin
Route::prefix('super-admin')->middleware(['auth', 'verified', 'role:super admin'])->group(function () {
    Route::get('/', [ApplicationController::class, 'index'])->name('super-admin');
    // Route::get('/list', [ApplicationController::class, 'index'])->name('super-admin.application.list');
    // Route::get('/setting', [ApplicationController::class, 'index'])->name('super-admin.application.setting');

    Route::prefix('application')->middleware(['auth', 'verified', 'role:super admin'])->group(function () {
        Route::get('/list', [ApplicationController::class, 'index'])->name('super-admin.application.list');
        Route::get('/setting', [ApplicationController::class, 'index'])->name('super-admin.application.setting');
    })->name('super-admin.application.*');

})->name('super-admin.*');

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/list', [UserController::class, 'index'])->name('user.list');
    Route::get('/data/list', [UserController::class, 'data'])->name('user.data.list');
})->name('user.*');

Route::prefix('application')->middleware(['auth', 'verified', 'role:super admin|admin'])->group(function () {
    Route::get('/list', [ApplicationController::class, 'index'])->name('application.list');
    Route::get('/setting', [ApplicationController::class, 'index'])->name('application.setting');
})->name('application.*');

Route::prefix('tutorial')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('tutorial.*');
    Route::get('/detail', [UserController::class, 'index'])->name('tutorial.detail');
})->name('tutorial.*');


require __DIR__.'/auth.php';