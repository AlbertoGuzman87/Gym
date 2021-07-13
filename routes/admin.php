<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('dashboar', [HomeController::class,'index'])->name('dashboard');
