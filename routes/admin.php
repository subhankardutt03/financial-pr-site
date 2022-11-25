<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/login', 'LoginPage')->name('login.page');
        Route::match(['get', 'post'], '/login/owner', 'Login')->name('login');
        Route::get('/dashboard', 'Dashboard')->name('dashboard')->middleware(['admin', 'tokenStatus']);
        Route::get('/logout', 'Logout')->name('logout')->middleware(['admin', 'tokenStatus']);
    });