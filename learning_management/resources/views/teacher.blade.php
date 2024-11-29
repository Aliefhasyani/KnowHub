@extends('layout.layout')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Custom Styles -->
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --hover-color: #3498db;
        }

        body {
            background-color: #f4f6f9;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .admin-container {
            max-width: 800px;
            margin: 2rem auto;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        .admin-header {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .admin-header h1 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .admin-navbar {
            background-color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e9ecef;
        }

        .admin-menu {
            background-color: white;
            border-radius: 0 0 12px 12px;
        }

        .admin-menu-item {
            display: block;
            padding: 1rem 1.5rem;
            color: var(--secondary-color);
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 1px solid #f1f3f5;
        }

        .admin-menu-item:hover {
            background-color: #f8f9fa;
            color: var(--hover-color);
            transform: translateX(10px);
        }

        .admin-menu-item:last-child {
            border-bottom: none;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .icon {
            margin-right: 10px;
            opacity: 0.7;
        }
      
    </style>
</head>
<body>
    <div class="container admin-container">
        <div class="admin-header">
            <h1 class="display-5">Teacher Dashboard</h1>
            <p class="text-light">Manage your platform efficiently</p>
        </div>

        <div class="admin-navbar">
            <a href="{{ route('homepage') }}" class="text-decoration-none text-secondary">
                <i class="fas fa-home icon"></i>Home
            </a>
            <a href="/logout" class="logout-btn" style="text-decoration:none;">
                <i class="fas fa-sign-out-alt icon" ></i>Logout
            </a>
        </div>

        <div class="admin-menu">
           
            <a href="{{ route('coursesView') }}" class="admin-menu-item">
                <i class="fas fa-graduation-cap icon"></i>Courses Management
            </a>
          
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>
</html>
@endsection 