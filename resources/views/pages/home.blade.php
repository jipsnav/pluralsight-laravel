@extends('templates.app')

@section('title', 'Home')

@section('content')
<h1>Home</h1>
@forelse ($posts as $post)
<a href="{{ route('posts.edit', $post->id) }}">
  <div class="post-item">
    <div class="post-content">
      <h2>{{ $post->title }}</h2>
      <p>{{ $post->description }}</p>
    </div>
  </div>
</a>
@empty
<h2>There are no posts yet.</h2>
@endforelse

@endsection