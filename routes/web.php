<?php

use Illuminate\Support\Facades\Route;
use Src\User\Infrastructure\EloquentModels\UserEloquentModel;

Route::get('/', function () {
    $users = UserEloquentModel::all();
    return response()->json($users);
});
