<?php

use Illuminate\Support\Facades\Route;

// Auth
use App\Http\Controllers\AuthController;

// Dashboard
use App\Http\Controllers\DashboardController;

// Admin
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

// User
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserTransactionController;


// =======================
// HOME → login
// =======================
Route::get('/', fn() => redirect('/login'));


// =======================
// AUTH
// =======================
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('logout');


// =======================
// DASHBOARD
// =======================
Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'role:admin']);

Route::get('/staff/dashboard', [DashboardController::class, 'staff'])
    ->middleware(['auth', 'role:staff']);

Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'role:user'])
    ->name('user.dashboard');


// =======================
// ADMIN ROUTES
// =======================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('transactions', TransactionController::class);
});


// =======================
// USER ROUTES
// =======================
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {

    // Products
    Route::get('/products', [UserProductController::class, 'index'])
        ->name('user.products');

    // Profile
    Route::get('/profile', [UserProfileController::class, 'index'])
        ->name('user.profile');

    Route::get('/profile/create', [UserProfileController::class, 'create'])
        ->name('user.profile.create');

    Route::post('/profile/store', [UserProfileController::class, 'store'])
        ->name('user.profile.store');

    Route::get('/profile/edit', [UserProfileController::class, 'edit'])
        ->name('user.profile.edit');

    Route::post('/profile/update', [UserProfileController::class, 'update'])
        ->name('user.profile.update');

    // Transactions
    Route::get('/transactions', [UserTransactionController::class, 'index'])
        ->name('user.transactions');

    Route::get('/transactions/create', [UserTransactionController::class, 'create'])
        ->name('user.transactions.create');

    Route::post('/transactions/store', [UserTransactionController::class, 'store'])
        ->name('user.transactions.store');
});
