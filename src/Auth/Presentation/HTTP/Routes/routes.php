<?php

use Illuminate\Support\Facades\Route;
use Src\Auth\Presentation\HTTP\Controllers\AuthController;

Route::get('login', [AuthController::class, 'create'])->name('auth.create');
Route::post('login', [AuthController::class, 'store'])->name('auth.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('auth.destroy');
