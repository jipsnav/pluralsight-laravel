<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'DBTC Blog')</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="antialiased">
  <ul class="nav">
    
    <li><a @if (request()->routeIs('pages.home'))
      @class(['active'])
    @endif href="{{ route('pages.home') }}">Home</a></li>
    <li><a @if (request()->routeIs('pages.about'))
      @class(['active'])
    @endif href="{{ route('pages.about') }}">About</a></li>
    <li><a @if (request()->routeIs('posts.create'))
      @class(['active'])
    @endif href="{{ route('posts.create') }}">Create</a></li>
  </ul>

  @includeWhen($errors->any(),'templates._errors')
  @if (session('success'))
    <div class="flash-success">
      {{ session('success') }}
    </div>
  @endif
  @yield('content')
</body>
</html>