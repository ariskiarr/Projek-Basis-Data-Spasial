<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TempatMakanController;
use App\Http\Controllers\Admin\MenuMakanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\TempatMakanDetailController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\User\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard-user', [DashboardUserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.user');

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    // Detail tempat makan
    Route::get('/tempat-makan/{id}', [TempatMakanDetailController::class, 'show'])->name('tempat.show');

    // Favorites
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    Route::post('/tempat-makan/{id}/favorite', [FavoriteController::class, 'toggle'])->name('favorite.toggle');

    // Reviews
    Route::post('/tempat-makan/{id}/review', [ReviewController::class, 'store'])->name('review.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('tempat-makan', TempatMakanController::class);

    // Menu Makan Routes (nested under tempat-makan)
    Route::get('tempat-makan/{tempat_id}/menu', [MenuMakanController::class, 'index'])->name('menu-makan.index');
    Route::get('tempat-makan/{tempat_id}/menu/create', [MenuMakanController::class, 'create'])->name('menu-makan.create');
    Route::post('tempat-makan/{tempat_id}/menu', [MenuMakanController::class, 'store'])->name('menu-makan.store');
    Route::get('tempat-makan/{tempat_id}/menu/{id}/edit', [MenuMakanController::class, 'edit'])->name('menu-makan.edit');
    Route::put('tempat-makan/{tempat_id}/menu/{id}', [MenuMakanController::class, 'update'])->name('menu-makan.update');
    Route::delete('tempat-makan/{tempat_id}/menu/{id}', [MenuMakanController::class, 'destroy'])->name('menu-makan.destroy');

    // API for calorie estimation
    Route::post('menu/estimate-kalori', [MenuMakanController::class, 'getCalorieEstimate'])->name('menu.estimate-kalori');
});

// User Routes - API Endpoints
Route::middleware('auth')->prefix('api')->name('api.')->group(function () {
    Route::get('tempat-makan', [DashboardUserController::class, 'getTempatMakan']);
    Route::get('tempat-makan/{id}', [TempatMakanDetailController::class, 'getDetail']);
});

require __DIR__.'/auth.php';
