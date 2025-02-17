<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MakeupController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('client', ClientController::class)->middleware('auth');
Route::resource('service', ServiceController::class)->middleware('auth');
Route::resource('photo', PhotoController::class)->middleware('auth');
Route::resource('makeup', MakeupController::class)->middleware('auth');



require __DIR__.'/auth.php';
