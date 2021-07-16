<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Users;

Route::get('dashboard', [HomeController::class,'index'])->name('dashboard');

Route::resource('users', Users::class)->except('destroy')->names('admin.users');
