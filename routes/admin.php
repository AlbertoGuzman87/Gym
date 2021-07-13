<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('dashboard', [HomeController::class,'index'])->name('dashboard');
