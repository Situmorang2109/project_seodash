<?php

use Illuminate\Support\Facades\Route;

// AUTH
use App\Http\Controllers\AuthController;

// ADMIN
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminTransactionController;

// USER
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserTransactionController;

// MIDDLEWARE
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;


// Default → Login
Route::get('/', fn() => redirect()->route('login'));


// AUTH
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ADMIN PANEL
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/categories', AdminCategoryController::class)
        ->names('admin.categories');

    Route::resource('/products', AdminProductController::class)
        ->names('admin.products');

    Route::resource('/transactions', AdminTransactionController::class)
        ->names('admin.transactions');
});


// USER PANEL
Route::prefix('user')->middleware(['auth', UserMiddleware::class])->group(function () {

    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');

    // Products
    Route::get('/products', [UserProductController::class, 'index'])
        ->name('user.products.index');

    Route::get('/products/{id}', [UserProductController::class, 'show'])
        ->name('user.products.show');

    // Transactions
    Route::get('/transactions', [UserTransactionController::class, 'index'])
        ->name('user.transactions.index');

    Route::get('/transactions/create', [UserTransactionController::class, 'create'])
        ->name('user.transactions.create');

    Route::post('/transactions', [UserTransactionController::class, 'store'])
        ->name('user.transactions.store');

    // Profile
    Route::get('/profile', [UserDashboardController::class, 'profile'])
        ->name('user.profile');

    Route::post('/profile', [UserDashboardController::class, 'updateProfile']);
});
