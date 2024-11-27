@extends('layout.layout')

@section('content')
    

<div class="container mt-4">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Course Name: {{ $course->name }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Course ID: {{ $course->id }}</h6>
                        <p class="card-text">{{ $course->description }}</p>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Created by: {{ $course->teacher_name }}
                        </h6>
                        <h6 class="card-subtitle mb-2 text-muted">Created at: {{ $course->created_at }}</h6>
                    </div>
                    @if((Auth::user()->role === 'teacher' && $course->users->contains('id', Auth::id())) || Auth::user()->role === 'admin')
                        <div class="card-footer">
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                            <a href="{{ route('courses.updateForm', $course->id) }}" class="btn btn-warning btn-sm mt-2">Edit</a>
                            <a href="{{ route('courses.updateForm', $course->id) }}" class="btn btn-warning btn-sm mt-2">Content</a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    
    
    </div>
</div>

<div>
    <a href="createCourse"><button class="btn btn-primary btn-md mt-5 mb-3" type="submit" style="margin-left: 20px">Add Courses</button></a>
    

    <a href="/logout" class="btn btn-md btn-danger  mt-5 mb-3" style="margin-left: 20px" type="submit">Log out</a>
    <a href="/admin"><button class="btn btn-warning btn-md mt-5 mb-3 " type="" style="margin-left: 20px">Admin Dashboard</button></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3BO8H1yP8j62R+5d9G5uVTdj4z32sFsKvYO2iIqVqgl7znG6DPvGVzbXW9ZF8W9" crossorigin="anonymous"></script>
@endsection