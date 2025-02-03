<?php

use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;


// Route::get('', [RoutingController::class, 'index'])->name('root');
// Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
// Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
// Route::get('{any}', [RoutingController::class, 'root'])->name('any');
// Route::get('{first}/{second}/{third}/{id}', [RoutingController::class, 'fourthLevel'])->name('fourth');


Route::get('/editor', function () {
    return view('user-pages.editor');
})->name('editor');
