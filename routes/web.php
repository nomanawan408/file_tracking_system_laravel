<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // FIle System
    Route::get('/files/create', [FileController::class, 'create'])->name('files.create');
    Route::post('/files/store', [FileController::class, 'store'])->name('files.store');
    Route::get('/files/summary', [FileController::class, 'newFilesSummary'])->name('files.summary');
    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::put('/files/{file}/status', [FileController::class, 'changeStatus'])->name('files.changeStatus');
    Route::delete('/files/{file}', [FileController::class, 'destroy'])->name('files.destroy');
    Route::get('/files/search', [FileController::class, 'search'])->name('files.search');


    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
