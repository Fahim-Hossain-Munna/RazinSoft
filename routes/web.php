<?php

use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('taskwithrazin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
});



require __DIR__.'/auth.php';
