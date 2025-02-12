<?php

use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Auth\AuthController;

// ✅ Do NOT apply middleware to login route!
Route::get('/', [RoutingController::class, 'index'])->name('root')->middleware(CheckRole::class . ':guest');
Route::get('/login', [RoutingController::class, 'login'])->name('login')->middleware(CheckRole::class . ':guest');
Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware(CheckRole::class . ':guest');
Route::get('/register', [RoutingController::class, 'register'])->name('register')->middleware(CheckRole::class . ':guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware(CheckRole::class . ':guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ✅ Group admin routes inside middleware
Route::middleware([CheckRole::class . ':admin'])->group(function () {
    Route::get('/admin-pages/', [RoutingController::class, 'indexAdmin'])->name('admin-index');
    Route::get('/admin-pages/{any}', [RoutingController::class, 'rootAdmin'])->name('anyAdmin');
    Route::get('/admin-pages/{first}/{second}', [RoutingController::class, 'secondLevelAdmin'])->name('secondAdmin');
    Route::get('/admin-pages/{first}/{second}/{third}', [RoutingController::class, 'thirdLevelAdmin'])->name('thirdAdmin');
    Route::get('/admin-pages/{first}/{second}/{third}/{id}', [RoutingController::class, 'fourthLevelAdmin'])->name('fourthAdmin');
});

Route::middleware([CheckRole::class . ':user'])->group(function () {
    Route::get('/index', [RoutingController::class, 'index'])->name('user-index')->middleware(CheckRole::class . ':guest');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}/{third}/{id}', [RoutingController::class, 'fourthLevel'])->name('fourth');
});