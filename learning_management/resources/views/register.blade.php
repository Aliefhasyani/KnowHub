<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        
        :root {
            --primary-color: #3454D1;
            --secondary-color: #4A5568;
            --background-color: #F4F7FF;
            --card-background: #FFFFFF;
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: var(--background-color);
            line-height: 1.6;
            color: var(--secondary-color);
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%; 
            height: 100%; 
        }


        .login-container {
            width: 100%;
            max-width: 450px;
            background-color: var(--card-background);
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            padding: 40px;
            transition: all var(--transition-speed) ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(50, 50, 93, 0.15), 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            text-align: center;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 30px;
            font-size: 2.25rem;
            letter-spacing: -0.025em;
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border-color: #E2E8F0;
            transition: all var(--transition-speed) ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 84, 209, 0.1);
        }

        .form-control::placeholder {
            color: #A0AEC0;
            opacity: 0.7;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: all var(--transition-speed) ease;
        }

        .btn-primary:hover {
            background-color: #2C3E90;
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 3px rgba(52, 84, 209, 0.3);
        }

        .login-links {
            text-align: center;
            margin-top: 20px;
        }

        .login-links a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color var(--transition-speed) ease;
        }

        .login-links a:hover {
            color: #2C3E90;
            text-decoration: underline;
        }

        .alert-danger {
            border-radius: 8px;
            background-color: #FFF5F5;
            border-color: #FED7D7;
            color: #C53030;
        }

        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        @media (max-width: 576px) {
            .login-container {
                width: 95%;
                margin: 20px;
                padding: 25px;
            }

            .login-title {
                font-size: 1.75rem;
            }
        }

        
     
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="login-container">
            <h1 class="login-title">REGISTER</h1>

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
                    <input type="text" name="name" class="form-control"  placeholder="username" required>
                </div>

                
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com"  required>
                </div>

                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="passwordexample" required>
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

