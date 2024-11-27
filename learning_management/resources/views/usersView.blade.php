<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    body {
        background-color: lightblue;
    }

    .btn-square {
        padding: 10px 20px;
        border-radius: 0px;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .cover-buttons {
        margin-top: 20px;
        text-align: right;
    }

    table {
        margin: 40px auto;
        width: 80%;
    }

    .table th, .table td {
        text-align: center;
    }

    .table th {
        background-color: #0d6efd;
        color: white;
    }
</style>

<body>
    @extends('layout.layout')

    @section('content')
        <br>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <table class="table table-bordered table-striped mb-2">
            <thead>
                <tr>
                    <th style="background-color: red">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('students.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                        <a href="{{ route('students.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end cover-buttons">
            <a href="/create"><button class="btn btn-primary btn-md btn-square" type="submit">Add User</button></a>
            
        
            <a href="/admin"><button class="btn btn-warning btn-md btn-square" type="submit">Admin Dashboard</button></a>
            
        
            <a href="/logout"><button class="btn btn-danger btn-md btn-square" type="submit">Logout</button></a>
        </div>
    @endsection
</body>
</html>