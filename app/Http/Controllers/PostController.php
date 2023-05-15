<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

  public function create() {
    return view('posts.create');
  }

  public function store(PostRequest $request) {
    $validated = $request->validated();
    $post = Posts::create($validated);

    return redirect()
      ->route('posts.show', $post)
      ->with('success', "Post is submitted! $post->title $post->description");

  }

  public function show(Posts $post) {
    return view('posts.show', compact('post'));
  }

  public function edit(Posts $post) {
    return view('posts.edit', compact('post'));
  }

  public function update(PostRequest $request, Posts $post) {
    $validated = $request->validated();
    $post->update($validated);

    return redirect()
      ->route('posts.show', $post)
      ->with('success', "Post is updated! $post->title $post->description");
  }

  public function destroy(Posts $post) {
    // delete data
    $post->delete();
    // redirect to create page with success message
    return redirect()
      ->route('pages.home')
      ->with('success', "Posts is deleted!");
  }
}
