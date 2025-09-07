<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdController::class, 'index'])->name('home');
Route::get('ads/{ad}', [AdController::class, 'show'])->name('ads.show');
// ----------------------------------------------Protected routes----------------------------------------------//
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);

    Route::post('/ads', [AdController::class, 'store'])->name('ads.store');
    Route::get('/ads/create', [AdController::class, 'create'])->name('ads.add');
    Route::get('/ads/{ad}', [AdController::class, 'show'])->name('ads.show');
    Route::put('/ads/{ad}', [AdController::class, 'update'])->name('ads.update');
    Route::put('/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
    Route::resource('categories', CategoryController::class);
});

Route::post('/search', [SearchController::class, 'search'])->name('search');

// ----------------------------------------------Athentication routes----------------------------------------------//
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.submit');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.submit');
    Route::post('/logout', 'logout')->name('logout');
});

// -------------------------------------------Email verification routes-------------------------------------------//
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
