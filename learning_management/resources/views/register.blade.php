<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1  style="text-align:center; margin-bottom:20px;">REGISTER</h1>
        @if($errors ->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $item)
                <ul>
                    <li>{{$item}}</li>
                </ul>
            @endforeach
        </div>
        @endif
        
        <form action="{{ route('register') }}" method="POST">

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{Session::get('name')}}" name="name" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{Session::get('email')}}" name="email" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" style="max-width: 85%;">
            </div>
            <label for="role" class="form-label">Role</label>
            <select class="form-control" name="role">
                <option value="student" {{ Session::get('role') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="teacher" {{ Session::get('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
            </select>

            
            
            <div style="display: flex; flex-direction:column;  gap: 10px; margin-top:10px; margin-bottom:10px;">
                <a href="{{ route('login')}}" >Already have an account?</a>                
                <a href="{{ route('homepage')}}">Sign in as a guest</a>                
            </div>


            
            
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary" >Register</button>
            </div>
        </form>
    </div> 
    </div>
</body>
</html>