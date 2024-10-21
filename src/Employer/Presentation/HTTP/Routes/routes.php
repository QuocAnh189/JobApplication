<?php

use Illuminate\Support\Facades\Route;
use Src\Employer\Presentation\HTTP\Controllers\EmployerController;

Route::get('create', [EmployerController::class, 'create'])->name('employer.create');
Route::post('', [EmployerController::class, 'store'])->name('employer.store');
