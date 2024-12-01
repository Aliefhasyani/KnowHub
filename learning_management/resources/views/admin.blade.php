@extends('layout.layout')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            --secondary-gradient: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
            --background-light: #f4f6f9;
            --text-primary: #2c3e50;
            --text-secondary: #34495e;
            --hover-color: #3498db;
        }

        body {
            background-color: var(--background-light);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .admin-container {
            max-width: 900px;
            margin: 3rem auto;
            perspective: 1000px;
        }

        .admin-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1), 0 5px 15px rgba(0,0,0,0.07);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .admin-card:hover {
            transform: translateY(-10px); 
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .admin-header {
            background: var(--primary-gradient);
            color: white;
            padding: 2.5rem;
            text-align: center;
        }

        .admin-header h1 {
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 0.75rem;
        }

        .admin-header p {
            color: rgba(255,255,255,0.8);
            font-weight: 300;
        }

        .admin-navbar {
            background-color: white;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e9ecef;
        }

        .admin-menu {
            background-color: white;
            border-radius: 0 0 16px 16px;
        }

        .admin-menu-item {
            display: flex;
            align-items: center;
            padding: 1.25rem 1.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 1px solid #f1f3f5;
            position: relative;
            overflow: hidden;
        }

        .admin-menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(52,73,94,0.1), transparent);
            transition: all 0.5s ease;
        }

        .admin-menu-item:hover::before {
            left: 100%;
        }

        .admin-menu-item:hover {
            color: var(--hover-color);
            transform: translateX(10px);
        }

        .admin-menu-item .icon {
            margin-right: 15px;
            color: var(--text-secondary);
            transition: color 0.3s ease;
            opacity: 0.7;
        }

        .admin-menu-item:hover .icon {
            color: var(--hover-color);
            opacity: 1;
        }

        .admin-menu-item:last-child {
            border-bottom: none;
        }

        .logout-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border: none;
            padding: 0.625rem 1.25rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .logout-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .logout-btn .icon {
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .admin-container {
                margin: 1rem;
                width: calc(100% - 2rem);
            }
        }
    </style>
</head>
<body>
    <div class="container admin-container">
        <div class="admin-card">
            <div class="admin-header">
                <h1 class="display-6">Admin Dashboard</h1>
               
                <p>Manage your platform with precision and ease</p>
            </div>

            <div class="admin-navbar">
                <a href="{{ route('homepage') }}" class="text-decoration-none text-secondary d-flex align-items-center">
                    <i class="fas fa-home icon"></i>Home
                </a>
                <a href="/logout" class="logout-btn" style="text-decoration:none;">
                    <i class="fas fa-sign-out-alt icon"></i>Logout
                </a>
            </div>

            <div class="admin-menu">
                <a href="{{ route('usersView') }}" class="admin-menu-item">
                    <i class="fas fa-users icon"></i>
                    <span>Users Management</span>
                </a>
                <a href="{{ route('coursesView') }}" class="admin-menu-item">
                    <i class="fas fa-graduation-cap icon"></i>
                    <span>Courses Management</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection