<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLendingController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('book_management')->group(function () {
        Route::resource('/book/create', BookController::class)->names('books');
        Route::put('/book_management/book/{book}', [BookController::class, 'update'])->name('books.update');
        Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    });

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('member_management')->group(function () {
        Route::resource('/member', MemberController::class)->names('members')->only(['create', 'index']);
        Route::post('/members', [MemberController::class, 'store'])->name('members.store');
        Route::get('/books', [BookController::class, 'index'])->name('books.index');
    });

    Route::prefix('lending_management')->group(function () {
        Route::resource('/lending', BookLendingController::class)->names('lendings')->only(['create', 'index']);
        Route::post('/lending', [BookLendingController::class, 'store'])->name('lending.store');
        Route::post('/lendings', [BookLendingController::class, 'store'])->name('lendings.store');
        Route::get('/book-lendings', [BookLendingController::class, 'index'])->name('book-lendings.index');

    });
});

Route::get('/counts/fetch', [CountController::class, 'fetch'])->name('counts.fetch');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
require __DIR__ . '/auth.php';
