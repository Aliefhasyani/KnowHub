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
                        <a class="nav-link" href="{{ route('homepage') }}">
                            <i class="fas fa-home me-2"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.student') }}">
                            <i class="fas fa-book me-2"></i>Courses Catalog
                        </a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.page', ['id' => Auth::id()]) }}">
                            <i class="fas fa-user me-2"></i>Profile
                        </a>
                    </li>
                    @endauth
                  
                    @if(Auth::user()->role == 'admin')
                        <a class="nav-link" href="/admin">
                            <i class="fas fa-home me-2"></i>Admin Dashboard
                        </a>
                    @endif
                    @if(Auth::user()->role == 'teacher')
                    <a class="nav-link" href="/teacher">
                        <i class="fas fa-home me-2"></i>Teacher Dashboard
                    </a>
                    @endif
                </ul>
    
                <form class="d-flex me-3" action="{{ route('courses.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search courses" aria-label="Search" required>
                    <button class="btn btn-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                
                
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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
 

     
        footer {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 4rem 0;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer-section {
            flex: 1;
            margin: 0 15px;
            min-width: 200px;
        }

        .footer-section h5 {
            color: white;
            font-weight: bold;
            border-bottom: 2px solid rgba(255,255,255,0.3);
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-bottom: 8px;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-contact p {
            margin-bottom: 10px;
        }

        .footer-social .social-icons {
            display: flex;
            gap: 15px;
        }

        .footer-social .social-icons a {
            color: white;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            opacity: 0.8;
        }

        .footer-social .social-icons a:hover {
            opacity: 1;
            transform: scale(1.2);
        }

        .footer-bottom {
            background-color: rgba(0,0,0,0.2);
            padding: 1.5rem 0;
            text-align: center;
            color: rgba(255,255,255,0.7);
        }

        .footer-bottom a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .footer-bottom a:hover {
            color: rgba(255,255,255,0.8);
            text-decoration: underline;
        }

  
       
    </style>
    @stack('styles')






    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section about">
                    <h5>About KnowHub</h5>
                    <p>KnowHub is an innovative learning platform dedicated to providing high-quality educational resources and empowering learners worldwide.</p>
                </div>

                <div class="footer-section quick-links">
                    <h5>Quick Links</h5>
                    <div class="footer-links">
                        <a href="{{ route('homepage') }}"><i class="fas fa-chevron-right me-2"></i>Home</a>
                        <a href="{{ route('courses.student') }}"><i class="fas fa-chevron-right me-2"></i>Courses</a>
                        @auth
                        <a href="{{ route('profile.page', ['id' => Auth::id()]) }}"><i class="fas fa-chevron-right me-2"></i>Profile</a>
                        @endauth
                        
                    </div>
                </div>

                <div class="footer-section contact footer-contact">
                    <h5>Contact Us</h5>
                    <p>
                        <i class="fas fa-map-marker-alt me-2"></i> Parepare
                    </p>
                    <p>
                        <i class="fas fa-envelope me-2"></i> support@knowhub.com
                    </p>
                    <p>
                        <i class="fas fa-phone me-2"></i> 08114120051
                    </p>
                </div>

                <div class="footer-section social footer-social">
                    <h5>Connect With Us</h5>
                    <div class="social-icons">
                        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <br>
      
     
    </footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')


    
    
</body>
</html>

