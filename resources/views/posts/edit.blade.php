{{-- extend from templates.app --}}
@extends('templates.app')
{{-- define the title section --}}
@section('title', 'Edit Post')
{{-- define the content section --}}

@section('content')
<a href="{{ route('pages.home') }}">< Go back</a>
<h1>Edit Post</h1>
<form action="{{ route('posts.update', $post->id) }}" method="post">
  @csrf
  @method('PUT')
  <label for="title">Title</label>
  <input @error('title') @class(['error-border']) @enderror type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}">
  @error('title')
    <div class="error">
      {{ $message }}
    </div>
  @enderror
  <label for="description">Description</label>
  <textarea @error('description') @class(['error-border']) @enderror name="description" name="description" id="description" cols="30" rows="10">
    {{ old('description') ?? $post->description }}
  </textarea>
  @error('description')
    <div class="error">
      {{ $message }}
    </div>
  @enderror
  <button type="submit">Submit</button>
</form>
@endsection