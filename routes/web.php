<?php

use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

// ✅ Do NOT apply middleware to login route!
Route::get('/login', [RoutingController::class, 'login'])->name('login')->middleware(CheckRole::class . ':guest');
Route::get('/register', [RoutingController::class, 'register'])->name('register')->middleware(CheckRole::class . ':guest');

// ✅ Group admin routes inside middleware
Route::middleware([CheckRole::class . ':admin'])->group(function () {
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}/{third}/{id}', [RoutingController::class, 'fourthLevel'])->name('fourth');
});


// Route::get('', [RoutingController::class, 'index'])->name('root');




// Route::get('/editor', function () {
//     return view('user-pages.editor');
// })->name('editor');
