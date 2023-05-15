<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('pages.home');

Route::get('/about', [HomeController::class, 'about'])->name('pages.about');

Route::resource('posts', PostController::class)->except(['index']);


