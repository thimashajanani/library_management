<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/create', function () {
    return view('book.create');
});

Route::get('/book/create', function () {
    return view('book.create');
});
    Route::get('/member/create', function () {
        return view('member.create');
});
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::resource('books', BookController::class);
});

require __DIR__.'/auth.php';
