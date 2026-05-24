<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileCompleteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Search routes (public)
Route::get('/search/matches', [MatchController::class, 'search'])->name('search.matches');
Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');

// Protected routes with profile completion check
Route::middleware(['auth', 'verified', 'profile.complete'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::post('/matches/{id}/interest', [MatchController::class, 'sendInterest'])->name('matches.send.interest');
    Route::post('/matches/{id}/accept', [MatchController::class, 'acceptInterest'])->name('matches.accept.interest');
    Route::get('/interests', [MatchController::class, 'interests'])->name('interests');
});

// Profile routes (some without profile completion check)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Matrimonial Profile Routes (available even if profile not complete)
    Route::get('/profile/complete', [ProfileCompleteController::class, 'create'])->name('profile.complete');
    Route::post('/profile/complete', [ProfileCompleteController::class, 'store'])->name('profile.complete.store');
    Route::get('/my-profile', [ProfileCompleteController::class, 'show'])->name('my.profile');
});

// Location API Routes (no auth needed for form)
// Route::prefix('api/location')->group(function () {
//     Route::get('/countries', [LocationController::class, 'countries'])->name('location.countries');
//     Route::post('/states',   [LocationController::class, 'states'])->name('location.states');
//     Route::post('/cities',   [LocationController::class, 'cities'])->name('location.cities');
// });
require __DIR__.'/auth.php';