<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>BooksApp</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
  </head>
  <body>
    <div class="container">
	   <div class="text-right">
			@if(Auth::check())
			  Logged in as <strong>{{Auth::user()->username}}</strong> -
			  <a href="{{URL::to('logout?_token='.csrf_token())}}">Log out</a>
			@else
			  <a href="{{URL::to('login')}}">Log in</a>
			@endif
      </div>
      <div class="page-header"> @yield('header') </div>
      @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
      @endif
	  @if(Session::has('error'))
        <div class="alert alert-warning">{{Session::get('error')}}</div>
      @endif
      @yield('content')
    </div>
  </body>
</html>
