<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', App\Http\Controllers\TaskController::class);
route::patch('tasks/{task}/toggle', [App\Http\Controllers\TaskController::class, 'toggle'])->name('tasks.toggle');
