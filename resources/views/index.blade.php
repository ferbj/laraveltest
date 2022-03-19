<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel testing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    @if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            @auth
                <a href="{{ url('/home') }}" class="nav-item nav-link active">Home</a>
            @else
                <a href="{{ route('login') }}" class="nav-item nav-link">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
            @endif
        @endauth
          </div>
        </div>
      </nav>
@endif
@if(Auth::check())
      <div class="jumbotron row justify">
        <h2>Welcome back {{ auth()->user()->name }}</h2>
      </div>
      <div class="mb-2">
          <hr>
      </div>
      <a href="{{route('home')}}">Dashboard</a>
@else
    <div class="jumbotron row justify m-5">
      <h2>Register or Login</h2>
      <a href="{{route('login')}}">Login</a>
      <a href="{{route('register')}}">Register</a>
    </div>

@endif
</body>
</html>
