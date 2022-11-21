<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::controller(AdminController::class)
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/login', 'LoginPage')->name('login.page');
        Route::post('/login', 'Login')->name('login');
    });