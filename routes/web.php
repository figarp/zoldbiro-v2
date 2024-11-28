<?php

use App\Http\Controllers\ChangelogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('services', [ServiceController::class, 'index'])->name('services.index');

Route::get('dashboard', [ChangelogController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('dashboard/services', [ServiceController::class, 'admin'])->middleware(['auth', 'verified'])->name('dashboard.services');
Route::get('dashboard/services/create', [ServiceController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.services.create');
Route::post('dashboard/services/store', [ServiceController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.services.store');
Route::delete('dashboard/services/destroy/{id}', [ServiceController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.services.destroy');
Route::get('dashboard/services/edit/{id}', [ServiceController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard.services.edit');
Route::post('dashboard/services/update/{id}', [ServiceController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard.services.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
