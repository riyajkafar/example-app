<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Models\Payment;
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
