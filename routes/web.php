<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\WorkController;
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

require __DIR__.'/auth.php';

// Route::middleware('auth')
//     ->prefix('admin')
//     ->name('admin.')
//     ->group(function () {
//         Route::resource('portfolios', PortfolioController::class);
//     });

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::resource('portfolios', PortfolioController::class);
    });

Route::get('/', [WorkController::class, 'home'])->name('home');
Route::get('/works', [WorkController::class, 'index'])->name('works.index');
Route::get('/works/{portfolio}', [WorkController::class, 'show'])->name('works.show');
