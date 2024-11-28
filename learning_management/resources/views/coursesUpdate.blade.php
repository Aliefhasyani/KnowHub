@extends('layout.layout')

@section('content')
    

    <style>
        .edit{
            margin: 40px;
            max-width: 80%;
        }

    </style>
    
   

    @if($errors ->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $item)
            <ul>
                <li>{{$item}}</li>
            </ul>
        @endforeach
    </div>
    @endif
    
<div class="edit">
    <h1 style="margin-top: 30px;">Edit Course</h1>
    <form action="{{ route('courses.update', $course->id) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $course->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ $course->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="teacher_name" class="form-label">Teacher Name</label>
            <input type="text" name="teacher_name" value="{{ $course->teacher_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="date" name="start_time" value="{{ $course->start_time }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="date" name="end_time" value="{{ $course->end_time }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-4" style="margin-left: 10px">Update</button>
    </form>
</div>
    
@endsection 

