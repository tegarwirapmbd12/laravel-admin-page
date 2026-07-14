<?php

use Illuminate\Support\Facades\Route;


Route::resource('testing_fours', \App\Http\Controllers\TestingFourController::class)
    ->parameters(['testing_fours' => 'uuid'])
    ->where(['uuid' => '[0-9a-f-]{36}']);
