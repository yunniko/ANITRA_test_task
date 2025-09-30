<?php

use App\Http\Controllers\TestTaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::controller(TestTaskController::class)->group(function () {
    Route::get('/tasks/1', 'task1');
    Route::get('/tasks/update/1', 'cacheTask1');
    Route::get('/tasks/2', 'task2');
    Route::get('/tasks/3', 'task3');
    Route::get('/tasks', 'index');
});
