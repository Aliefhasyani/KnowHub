@extends('layout.layout')

@section('content')
<style>
    :root {
        --primary-bg: #f4f6f9;
        --table-header-bg: #2c3e50;
        --table-header-text: #ffffff;
        --action-edit-bg: #3498db;
        --action-delete-bg: #e74c3c;
        --action-hover-opacity: 0.9;
    }

    body {
        background-color: var(--primary-bg);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .users-container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 30px;
        margin: 30px auto;
        max-width: 1200px;
    }

    .page-header {
        background-color: var(--table-header-bg);
        color: var(--table-header-text);
        padding: 20px;
        border-radius: 10px 10px 0 0;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .page-header h1 {
        margin: 0;
        font-weight: 600;
    }

    .table-users {
        width: 100%;
        margin-bottom: 20px;
    }

    .table-users thead {
        background-color: var(--table-header-bg);
        color: var(--table-header-text);
    }

    .table-users th {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
        font-weight: 600;
    }

    .table-users td {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .table-users tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table-users tbody tr:hover {
        background-color: #e9ecef;
        transition: background-color 0.3s ease;
    }

    .btn-action {
        margin: 0 5px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background-color: var(--action-edit-bg);
        color: white;
    }

    .btn-delete {
        background-color: var(--action-delete-bg);
        color: white;
    }

    .btn-action:hover {
        opacity: var(--action-hover-opacity);
        transform: translateY(-2px);
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn-nav {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-nav:hover {
        transform: translateX(5px);
    }
</style>

<div class="container users-container">
    <div class="page-header">
        <h1 class="display-6">
            <i class="fas fa-users me-3"></i>User Management
        </h1>
        <a href="/create" class="btn btn-success btn-lg">
            <i class="fas fa-user-plus me-2"></i>Add New User
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-users table-bordered table-hover">
            <thead>
                <tr>
                    <th style="background-color: rgb(45, 45, 117);color:white">ID</th>
                    <th style="background-color: rgb(45, 45, 117);color:white">Name</th>
                    <th style="background-color: rgb(45, 45, 117);color:white">Email</th>
                    <th style="background-color: rgb(45, 45, 117);color:white">Role</th>
                    <th style="background-color: rgb(45, 45, 117);color:white">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <span class="badge 
                            @if($item->role == 'admin') bg-danger 
                            @elseif($item->role == 'teacher') bg-warning 
                            @elseif($item->role == 'student') bg-success 
                            @else bg-secondary 
                            @endif
                        ">
                            {{ ucfirst($item->role) }}
                        </span>
                    </td>
                    <td>
                        <form class="d-inline" action="{{ route('students.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-action btn-delete" type="submit">
                                <i class="fas fa-trash-alt me-1"></i>Delete
                            </button>
                        </form>
                        <a href="{{ route('students.edit', $item->id) }}" class="btn btn-sm btn-action btn-edit">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="action-buttons">
        <a href="/admin" class="btn btn-secondary btn-nav">
            <i class="fas fa-arrow-left"></i>Admin Dashboard
        </a>
        <a href="/logout" class="btn btn-danger btn-nav">
            <i class="fas fa-sign-out-alt"></i>Logout
        </a>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous"></script>
@endsection