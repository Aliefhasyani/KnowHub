@extends('layout.layout')

@section('content')
<div class="container mt-4">
    <h1>Search Results</h1>
    <hr>
    @if($courses->isEmpty())
        <p class="text-muted">No courses found for your search query.</p>
    @else
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                            <a href="{{ route('detail', $course->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
