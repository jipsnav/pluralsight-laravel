<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('pages.home');

Route::get('/about', [HomeController::class, 'about'])->name('pages.about');

Route::group(['middleware' => 'guest'], function () {
  Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
  Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
  Route::resource('posts', PostController::class)->except(['index']);

  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});