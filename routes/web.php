<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Guest routes
Route::get('/', function () {
    return view('auth.login');
});

Route::get('register', function () {
    return view('auth/register');
})->middleware(['auth', 'verified'])->name('register');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::group(['prefix'=>'book'], function(){
        // Book routes
        Route::get('/books', [BookController::class, 'index'])->name('books.index');
        Route::get('/create', [BookController::class, 'create'])->name('books.create');
        Route::resource('books', BookController::class);
    });
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Member routes
    Route::resource('members', MemberController::class);
});

// Authentication routes
require __DIR__.'/auth.php';
