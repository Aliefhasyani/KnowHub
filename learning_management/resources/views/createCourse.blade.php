<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Add Course</title>
</head>
<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Course</h1>
       
        @if($errors ->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $item)
                <ul>
                    <li>{{$item}}</li>
                </ul>
            @endforeach
        </div>
        @endif
        <form action="{{ route('courses.create') }}" method="POST">

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" value="{{Session::get('name')}}" name="name" class="form-control">
            </div>
         
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <input type="text"  name="description" class="form-control">
            </div>
         
            
          
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary mt-4" >Submit</button>
            </div>
        </form>
    </div> 
    </div>
</body>
</html>