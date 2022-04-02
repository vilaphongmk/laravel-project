<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookAdminController;
use App\Http\Controllers\Admin\AboutAdminController;
use App\Http\Controllers\Member\MemberHomeController;
use App\Http\Controllers\User\AboutUserController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AdminRoleController;
use GuzzleHttp\Middleware;


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

//news
Route::get('/addnews', [AboutAdminController::class, 'News'])->name('news');
Route::post('/addnews', [AboutAdminController::class, 'Addnews'])->name('Addnews');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






Route::group(['middleware' => ['auth']], function () {

    //admin 
    Route::get('/admin', [HomeAdminController::class, 'Index'])->name('admin.home')->middleware('isAdmin');
    // member
    Route::get('/member', [MemberHomeController::class, 'Member'])->name('member');
    // role Admin
    Route::get('/role', [AdminRoleController::class, 'Index'])->name('role');
    Route::get('/admin/role/update/{slug}', [AdminRoleController::class, 'Update'])->name('role.update');
});
