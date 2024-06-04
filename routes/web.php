<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransducerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\RuleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

require __DIR__.'/auth.php';

Route::get('/transducers', function () {
    return view('transducers');
});
Route::resource('api/transducers', TransducerController::class)->except(['create', 'edit']);

// Menampilkan daftar log
Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
Route::post('/logs', [LogController::class, 'store'])->name('logs.store');
Route::get('/logs/{id}', [LogController::class, 'show'])->name('logs.show');
Route::put('/logs/{id}', [LogController::class, 'update'])->name('logs.update');
Route::delete('/logs/{id}', [LogController::class, 'destroy'])->name('logs.destroy');

Route::get('/rules', [RuleController::class, 'index'])->name('rules.index');
Route::post('/rules', [RuleController::class, 'store'])->name('rules.store');
Route::get('/rules/{id}', [RuleController::class, 'show'])->name('rules.show');
Route::put('/rules/{id}', [RuleController::class, 'update'])->name('rules.update');
Route::delete('/rules/{id}', [RuleController::class, 'destroy'])->name('rules.destroy');













