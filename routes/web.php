<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AboutAdminController;


Route::get('/', function () {
    return view('welcome');
});

// user routes
route::get('/about', [AboutAdminController::class, 'Index'])->name('user.about');
route::get('/about/form', [AboutAdminController::class, 'Form'])->name('admin.about.form');
route::post('/about/store', [AboutAdminController::class, 'Store'])->name('admin.about.store');
