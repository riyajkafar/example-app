<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;

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

    // Payment routes 
Route::prefix('payments')->group(function(){
    Route::get('/', [PaymentController::class,'index'])->name('payments.index');
    Route::get('/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/store', [PaymentController::class,'store'])->name('payments.store');
    Route::get('/show/{payment}',  [PaymentController::class,'show'])->name('payments.show');
    Route::get('/{id}/edit', [PaymentController::class,'edit'])->name('payments.edit');
    Route::put('/{payment}',  [PaymentController::class,'update'])->name('payments.update');
    Route::delete('/{payment}',  [PaymentController::class,'destroy'])->name('payments.destroy');
    });
    
});

require __DIR__.'/auth.php';



