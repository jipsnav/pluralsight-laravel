@extends('templates.app')

@section('title', 'Home')

@section('content')
<h1>Home</h1>
@forelse ($posts as $post)
  <div class="post-item">
    <div class="post-content">
      <h2><a href="{{ route('posts.show', $post)}}">{{ $post->title }}</a></h2>
      <p>{{ $post->description }}</p>
    </div>
  </div>
@empty
<h2>There are no posts yet.</h2>
@endforelse

@endsection