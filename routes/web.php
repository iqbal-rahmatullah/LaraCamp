<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\UserController;
use App\Models\Camp;
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
})->name('welcome');

Route::controller(CheckoutController::class)->group(function () {
    Route::post('/checkout/{camp}', 'store')->name('checkout.store');
    Route::get('/succes_checkout', 'success')->name('checkout.success');
    Route::get('/checkout/{camp:slug}', 'index')->name('checkout');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(UserUserController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/user/dashboard', 'dashboard')->name('user.dashboard');
    });
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
