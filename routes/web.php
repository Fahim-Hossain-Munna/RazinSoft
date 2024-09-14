<?php

use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\MyTaskController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\TaskController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::prefix('taskwithrazin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');

    // task
    Route::resource('/task',TaskController::class)->middleware('can:isAdmin');
    Route::get('/task/assign/{id}',[TaskController::class,'assign_task'])->name('task.assign')->middleware('can:isAdmin');

    // role
    Route::get('/role/assign',[RoleController::class,'index'])->name('role.assign')->middleware('can:admin');

    // my task
    Route::get('/my/task',[MyTaskController::class,'index'])->name('my.task.index');


});



require __DIR__.'/auth.php';
