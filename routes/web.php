<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DecorationController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MakeupController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TendaController;
use App\Models\Album;
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

Route::resource('error',ErrorController::class);







Route::resource('laporan', LaporanController::class)->middleware('auth');
Route::resource('client', ClientController::class)->middleware('auth');
Route::resource('makeup', MakeupController::class)->middleware('auth');
Route::resource('events', EventsController::class)->middleware('auth');
Route::resource('album', AlbumController::class)->middleware('auth');
Route::resource('catering', CateringController::class)->middleware('auth');
Route::resource('tenda', TendaController::class)->middleware('auth');
Route::resource('decoration', DecorationController::class)->middleware('auth');



require __DIR__.'/auth.php';
