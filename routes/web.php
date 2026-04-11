<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/admin', [AdminController::class, 'Admin']);
Route::get('/login/{username}/{password}', [AdminController::class, 'Login']);

