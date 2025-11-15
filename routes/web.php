<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// User controllers
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserTransactionController;

// Admin controllers (resource controllers)
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminTransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => redirect()->route('login'));

// AUTH
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// USER ROUTES (grouped, names prefixed `user.`)
Route::middleware(['auth','user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    Route::get('/products', [UserProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [UserProductController::class, 'show'])->name('products.show');

    Route::get('/transactions', [UserTransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [UserTransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions/store', [UserTransactionController::class, 'store'])->name('transactions.store');

    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/create', [UserProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile/store', [UserProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
});

// ADMIN ROUTES
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('transactions', App\Http\Controllers\Admin\AdminTransactionController::class);

});
