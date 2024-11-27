<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        
        body {
            background-color: #f0f2f5;
        }

        .login-container {
            max-width: 400px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 50px auto; 
            background-color: #fff;
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
            border-radius: 3px;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #3e8e41;
            border-color: #3e8e41;
        }

        .login-links {
            text-align: center;
            margin-top: 15px;
        }

        .login-links a {
            color: #4CAF50;
            text-decoration: none;
        }

        .login-links a:hover {
            text-decoration: underline;
        }

        .alert-danger {
            border-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="login-container">
            <h1 class="login-title">Register</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
             
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ Session::get('name') }}" required>
                </div>

                
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Session::get('email') }}" required>
                </div>

                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

          
                <div class="form-group">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="student" {{ Session::get('role') == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="teacher" {{ Session::get('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    </select>
                </div>

             
                <div class="login-links">
                    <a href="{{ route('login') }}">Already have an account?</a>
                    <br>
                    <a href="{{ route('homepage') }}">Sign in as a guest</a>
                </div>

                
                <div class="form-group mt-3">
                    <button name="submit" type="submit" class="btn btn-primary w-100">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
