<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Add underline effect on hover */
    .nav-link:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('build/assets/images/logofix.png') }}" alt="Your Brand Logo" width="80" height="80">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('homepage')}}" style="color: whitesmoke">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('courses.student')}}" style="color: whitesmoke" >Courses Catalog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: whitesmoke">Profile Page</a>
        </li>
      </ul>
    </div>

    <ul class="navbar-nav ms-auto">
      @if(!Auth::user())
      <li class="nav-item">
        <a class="nav-link" href="{{route('login')}}" style="color:white;">Log In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('register')}}" style="color:white;">Register</a>
      </li>
      @endif
      @if(Auth::user())
      <li class="nav-item">
        <a class="nav-link" href="/logout" style="color:white;">Log out</a>
      </li>
      @endif
    </ul>
  </nav>

  <main>
    @yield('content')
  </main>
</body>
</html>
