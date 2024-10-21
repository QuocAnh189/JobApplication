<?php

use Illuminate\Support\Facades\Route;
use Src\Job\Presentation\HTTP\Controllers\JobController;
use Src\Job\Presentation\HTTP\Controllers\MyJobController;

Route::group(['prefix' => 'job'], function () {
    Route::get('', [JobController::class, 'index'])->name('job.index');
    Route::get('/{id}', [JobController::class, 'show'])->name('job.show');
});

Route::resource('my-jobs', MyJobController::class);
