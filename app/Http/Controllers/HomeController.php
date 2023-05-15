<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class HomeController extends Controller
{
  public function home() {
    // fetch all posts
    $posts = Posts::all();
    // return view with posts
    return view('pages.home', compact('posts'));
  }

  public function about() {
    return view('pages.about');
  }
}
