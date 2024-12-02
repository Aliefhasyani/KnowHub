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
    <h1 style="margin-top: 30px;">Edit User</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST" style="margin-top:20px;">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ $student->email }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New Password (Kosongkan untuk menyimpan password yang lama)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <select name="role" class="form-control" required>
            <option value="student" {{ $student->role === 'student' ? 'selected' : '' }}>Student</option>
            <option value="teacher" {{ $student->role === 'teacher' ? 'selected' : '' }}>Teacher</option>
        </select>
   
        <button type="submit" class="btn btn-success mt-4" style="margin-left: 10px">Update</button>
    </form>
</div>
    
@endsection 



