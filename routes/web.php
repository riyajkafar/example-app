<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TaskController;

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

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Shop Routes
    Route::prefix('shops')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('shops.index');
        Route::get('/create', [ShopController::class, 'create'])->name('shops.create');
        Route::post('/store', [ShopController::class, 'store'])->name('shops.store');
        Route::get('/{id}/edit', [ShopController::class, 'edit'])->name('shops.edit');
        Route::put('/{shop}', [ShopController::class, 'update'])->name('shops.update');
        Route::delete('/{shop}', [ShopController::class, 'destroy'])->name('shops.destroy');
    });

    // Product Routes
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // Account routes
    Route::prefix('accounts')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('accounts.index');
        Route::get('/create', [AccountController::class, 'create'])->name('accounts.create');
        Route::post('/', [AccountController::class, 'store'])->name('accounts.store');
        Route::get('/{account}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
        Route::put('/{account}', [AccountController::class, 'update'])->name('accounts.update');
        Route::delete('/{account}', [AccountController::class, 'destroy'])->name('accounts.destroy');
    });

    // Payment routes
    Route::prefix('payments')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('payments.index');
        Route::get('/create', [PaymentController::class, 'create'])->name('payments.create');
        Route::post('/store', [PaymentController::class, 'store'])->name('payments.store');
        Route::get('/show/{payment}',  [PaymentController::class, 'show'])->name('payments.show');
        Route::get('/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
        Route::put('/{payment}',  [PaymentController::class, 'update'])->name('payments.update');
        Route::delete('/{payment}',  [PaymentController::class, 'destroy'])->name('payments.destroy');
    });

    // Task routes
    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update');
        Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    });
});

require __DIR__ . '/auth.php';
