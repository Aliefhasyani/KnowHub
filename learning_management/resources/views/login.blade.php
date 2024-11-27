<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
    <style>
        /* Custom styles for enhanced aesthetics */
        body {
            background-color: #f0f2f5; /* Light background for better readability */
        }

        .login-container {
            max-width: 400px; /* Adjust width for different screen sizes */
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            padding: 30px;
            margin: auto; /* Center the form horizontally */
            background-color: #fff; /* White background for the content area */
        }

        .login-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 3px; /* Rounded corners for a smoother look */
        }

        .btn-primary {
            background-color: #4CAF50; /* Customize button color based on brand */
            border-color: #4CAF50; /* Match button color for a consistent look */
        }

        .btn-primary:hover {
            background-color: #3e8e41; /* Darker shade on hover for visual feedback */
            border-color: #3e8e41;
        }

        .login-links {
            text-align: center;
            margin-top: 15px;
        }

        .login-links a {
            color: #4CAF50; /* Match link color with button color */
            text-decoration: none; /* Remove default underline */
        }

        .login-links a:hover {
            text-decoration: underline; /* Underline on hover for emphasis */
        }

        .alert-danger {
            border-color: #dc3545; /* Red border for error messages */
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="login-container">
            <h1 class="login-title">LOGIN</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="login-links">
                    <a href="{{ route('register') }}">Don't have an account?</a>
                    | <a href="{{ route('homepage') }}">Sign in as a guest</a>
                </div>

                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>