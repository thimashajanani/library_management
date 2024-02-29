<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('book_management')->group(function () {
        Route::resource('/book/create', BookController::class)->names('books');
    });

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('member_management')->group(function () {
    Route::resource('/member/create', MemberController::class)->names('members');
});

Route::get('/counts/fetch', [CountController::class, 'fetch'])->name('counts.fetch');
require __DIR__ . '/auth.php';
