<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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
    Route::post('/jobs/{id}/bookmark', [JobController::class, 'toggleBookmark'])->name('jobs.bookmark');
});

require __DIR__.'/auth.php';



Route::get('/showingjobspage', [JobController::class, 'index'])->name('home');

Route::get('/addingjob', function () {
    return view('add_job');
});


Route::put('/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');

Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');



Route::get('/addingjob', [JobController::class, 'create'])->name('jobs.create');



Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');

