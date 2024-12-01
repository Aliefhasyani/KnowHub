<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Learning Platform') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Navbar Styles */
        .navbar-custom {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .navbar-custom .navbar-brand {
            color: white;
            font-weight: bold;
            transition: transform 0.3s ease;
        }

        .navbar-custom .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.8);
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar-custom .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: white;
            transition: width 0.3s ease, left 0.3s ease;
        }

        .navbar-custom .nav-link:hover {
            color: white;
        }

        .navbar-custom .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        .navbar-custom .nav-link.active {
            color: white;
            font-weight: 700;
        }

        .navbar-custom .nav-link.active::after {
            width: 100%;
            left: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .navbar-custom .navbar-nav {
                text-align: center;
                background: rgba(0,0,0,0.1);
                border-radius: 8px;
                padding: 10px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('homepage') }}">
                <img src="{{ asset('build/assets/images/logofix.png') }}" 
                     alt="Platform Logo" 
                     width="50" 
                     height="50" 
                     class="d-inline-block align-middle me-2">
                <span class="d-none d-md-inline">KnowHub</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('homepage') }}">
                            <i class="fas fa-home me-2"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('courses.student') }}">
                            <i class="fas fa-book me-2"></i>Courses Catalog
                        </a>
                    </li>
                    
                    @auth
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('profile.page', ['id' => Auth::id()]) }}">
                            <i class="fas fa-user me-2"></i>Profile
                        </a>
                    </li>
                    @endauth
                    @if(Auth::user()->role=='admin')
                    <li class="nav-item">
                        <a class="nav-link " href="/admin   ">
                            <i class="fas fa-home me-2"></i>Admin Dashboard
                        </a>
                    </li>
                    @endif

                </ul>
                
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-light" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i>Log In
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-light text-primary" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-2"></i>Register
                            </a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="btn btn-outline-danger" href="/logout">
                                <i class="fas fa-sign-out-alt me-2"></i>Log Out
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>