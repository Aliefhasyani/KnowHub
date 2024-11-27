@extends('layout.layout')

@section('content')
<div class="container mt-4">
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

                        <!-- Enroll button -->
                        @if (Auth::check())
                            <form action="{{ route('courses.student', $course->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-3">Enroll</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div>
    @if (Auth::check())
    <a href="/logout" class="btn btn-md btn-danger mt-5 mb-3" style="margin-left: 20px" type="submit">Log out</a>
    @endif
    
    @if (!Auth::check())
    <a href="{{route('login')}}" class="btn btn-md btn-primary mt-5 mb-3" style="margin-left: 20px" type="submit">Log In</a>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3BO8H1yP8j62R+5d9G5uVTdj4z32sFsKvYO2iIqVqgl7znG6DPvGVzbXW9ZF8W9" crossorigin="anonymous"></script>
@endsection
