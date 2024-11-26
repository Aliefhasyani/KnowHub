<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-light">

  
  <div class="container col-md-6 border my-3 rounded px-5 py-3 pb-5">
    <h1 class="display-4 text-center">Halo!!</h1>
    <p class="lead text-center">Selamat datang di halaman admin</p>

    <nav class="navbar navbar-expand-lg navbar-light bg-white rounded mt-3">
      <div class="container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('homepage')}}">Home</a>
          </li>
        </ul>
        <a href="/logout" class="btn btn-sm btn-outline-secondary">Logout</a>
      </div>
    </nav>

    <div class="card mt-3 shadow">
      <ul class="list-group list-group-flush">
        <a href="{{ route('usersView')}}" style="text-decoration: none;"><li class="list-group-item">Users Management</li></a>
        
        <a href="{{ route('coursesView')}}" style="text-decoration: none;"><li class="list-group-item">Courses Management</li></a>
        <a href="{{ route('teacher')}}" style="text-decoration: none;"><li class="list-group-item">Teacher View</li></a>
      </ul>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>

</html>
