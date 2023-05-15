<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{

  public function create() {
    return view('posts.create');
  }

  public function store(Request $request) {
    // validate request fields before storing to database
    $request->validate([
      'title' => 'required|unique:posts|max:100',
      'description' => ['required', 'min:10'],
    ]);
    // create new post
    $post = new Posts();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();
    // redirect to create page with success message
    return redirect()
      ->route('pages.home')
      ->with('success', "Post is submitted! $post->title $post->description");

  }

  public function show($id) {
    $post = Posts::find($id);
    return view('posts.show', compact('post'));
  }

  public function edit($id) {
    // fetch data using id
    $post = Posts::find($id);
    return view('posts.edit', compact('post'));
  }

  public function update($id, Request $request) {
    // validate request fields before storing to database
    $request->validate([
      'title' => 'required',
      'description' => ['required', 'min:10'],
    ]);

    // fetch data using id
    $post = Posts::find($id);
    // update data
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();
    // redirect to create page with success message
    return redirect()
      ->route('posts.edit', $id)
      ->with('success', "Post is updated! $post->title $post->description");
  }

  public function destroy($id) {
    // fetch data using id
    $post = Posts::find($id);
    // delete data
    $post->delete();
    // redirect to create page with success message
    return redirect()
      ->route('posts.index')
      ->with('success', "Posts is deleted! $post->title $post->description");
  }
}
