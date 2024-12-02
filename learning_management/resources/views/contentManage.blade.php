@extends('layout.layout')

@section('content')
<div class="container mt-4">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
                <td>
                    <form class="d-inline" action="{{ route('content.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this content?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="fas fa-trash-alt me-1"></i> Delete
                        </button>
                    </form>
                    <a href="{{ route('content.updateForm', $item->id) }}" class="btn btn-sm btn-primary ms-2">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/createContent" class="btn btn-success btn-sm mb-3">
        <i class="bi bi-plus me-1"></i> Add New Content
    </a>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

@endsection     