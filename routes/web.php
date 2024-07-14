<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyResponseController;

Route::get('/', function () {
    return view('index');
});

Route::get('/skm', [SurveyController::class, 'show'])->name('surveys.show');
Route::post('/skm/store', [SurveyResponseController::class, 'store'])->name('skm.store');

Route::get('/reports', [SurveyResponseController::class, 'index'])->middleware(['auth', 'verified'])->name('reports.index');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('surveys', SurveyController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
