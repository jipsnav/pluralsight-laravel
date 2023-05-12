<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('pages.home');

Route::get('/about', [HomeController::class, 'about'])->name('pages.about');

Route::resource('posts', PostController::class);

// Route::name('posts.')->prefix('posts')->group(function () {
//   Route::get('/create', function () {
//     return view('posts.create');
//   })->name('create');
  
//   Route::post('/', function (Request $request) {
//     $request->validate([
//       'title' => 'required',
//       'description' => ['required', 'min:10'],
//     ]);
//     $title = $request->title;
//     $desc = $request->description;
//     return redirect()
//       ->route('posts.create')
//       ->with('success', "Post is submitted! $title $desc");
//   })->name('store');
// });


