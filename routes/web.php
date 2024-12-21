<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect(request()->user() ? route('tasks.index') : route('login'));
});

Route::middleware('auth')->group(function () {
    Route::get('/tasks/history', [TaskController::class, 'history'])->name('tasks.history');
    Route::get('/tasks/{task}/share', [TaskController::class, 'share'])->name('tasks.share');
    Route::get('/tasks/shared/{token}', [TaskController::class, 'shared'])->name('tasks.shared');
    Route::resource('/tasks', TaskController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
