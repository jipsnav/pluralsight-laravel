@extends('templates.app')

@section('title', "Show Post $post->title")

@section('content')
<div class="post-item">
  <div class="post-content">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <a href="{{ route('posts.edit', $post)}}">Edit post</a>
    <form action="{{ route('posts.destroy', $post) }}" method="post">
      @csrf
      @method('DELETE')
      <button class="delete" type="submit">Delete</button>
    </form>
  </div>
</div>
@endsection