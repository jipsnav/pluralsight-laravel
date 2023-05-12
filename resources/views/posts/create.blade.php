@extends('templates.app')

@section('title', 'Create Post')

@section('content')
<h1>Create a New Blog Post</h1>
<form action="{{ route('posts.store')}}" method="post">
  @csrf
  <label for="title">Title</label>
  <input @error('title') @class(['error-border']) @enderror type="text" name="title" id="title" value="{{ old('title') }}">
  @error('title')
    <div class="error">
      {{ $message }}
    </div>
  @enderror
  <label for="description">Description</label>
  <textarea @error('description') @class(['error-border']) @enderror name="description" name="description" id="description" cols="30" rows="10">
    {{ old('description') }}
  </textarea>
  @error('description')
    <div class="error">
      {{ $message }}
    </div>
  @enderror
  <button type="submit">Submit</button>
</form>
@endsection