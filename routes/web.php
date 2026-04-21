<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/admin', [AdminController::class, 'Admin']);
Route::get('/login/{username}/{password}', [AdminController::class, 'Login']);

Route::get('/authors', function () {
    return 'Authors List';
})->name('authors.index');

Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');


