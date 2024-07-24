<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);