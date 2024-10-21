<?php

use Illuminate\Support\Facades\Route;
use Src\JobApplication\Presentation\HTTP\Controllers\JobApplicationController;
use Src\JobApplication\Presentation\HTTP\Controllers\MyJobApplicationController;

Route::resource('job.application', JobApplicationController::class)
    ->only(['create', 'store']);

Route::get('my-job-applications', [MyJobApplicationController::class, 'index'])->name('my-job-applications.index');
Route::delete('my-job-applications/{jobApplication}', [MyJobApplicationController::class, 'destroy'])->name('my-job-applications.destroy');
