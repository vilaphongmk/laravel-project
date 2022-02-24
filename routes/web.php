<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AboutAdminController;
use App\Http\Controllers\Admin\UpdatAdminController;

Route::get('/', function () {
    return view('welcome');
});
// user routes
route::get('/home', [HomeAdminController::class, 'Home']);
// user routes
route::get('/about', [AboutAdminController::class, 'About']);
// user routes
route::get('/update', [UpdatAdminController::class, 'Update']);
