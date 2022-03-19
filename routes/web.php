<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookAdminController;
use App\Http\Controllers\Admin\AboutAdminController;
use App\Http\Controllers\User\AboutUserController;


Route::get('/', function () {
    return view('welcome');
});

// user routes
Route::get('/about', [AboutAdminController::class, 'Index'])->name('user.about');
Route::get('/about/form', [AboutAdminController::class, 'Form'])->name('admin.about.form');
Route::post('/about/store', [AboutAdminController::class, 'Store'])->name('admin.about.store');
Route::get('/about/book', [BookAdminController::class, 'Book'])->name('admin.about.book');
Route::post('/about/bookstore', [BookAdminController::class, 'BookStore'])->name('admin.about.bookstore');
Route::get('/about/home', [AboutUserController::class, 'Home'])->name('user.home.index');
Route::post('/about/remove', [AboutAdminController::class, 'Deletebook'])->name('admin.about.remove');
