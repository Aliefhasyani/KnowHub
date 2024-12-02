@extends('layout.layout')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2>{{ $course->name }}</h2>
        </div>
        <div class="card-body">
            <h4 class="mb-3">Course Description</h4>
            <p>{{ $course->description }}</p>

            <h4 class="mb-3">Course Details</h4>
               <div class="card-body">
                <p class="card-text text-muted mb-3">{{ Str::limit($course->description, 100) }}</p>
                
                <div class="course-details">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-person-check me-2 text-success"></i>
                        <small class="text-muted">Instructor: {{ $course->teacher_name }}</small>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class=" bi bi-chat-right-text me-2 text-success"></i>
                        <small class="text-muted">Description: {{ $course->description }}</small>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-calendar-check me-2 text-primary"></i>
                        <small class="text-muted">Starts: {{ \Carbon\Carbon::parse($course->start_time)->format('M d, Y') }}</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-calendar-x me-2 text-danger"></i>
                        <small class="text-muted">Ends: {{ \Carbon\Carbon::parse($course->end_time)->format('M d, Y') }}</small>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-people me-2 text-info"></i>
                        <small class="text-muted">Students Enrolled: {{ $course->student_count }}</small>
                    </div>
                    
                </div>
            </div>
            <h4 class="mb-3">Students Enrolled</h4>
            <p>{{ $course->users()->wherePivot('role', 'student')->count() }} students enrolled.</p>

            <a href="{{ route('courses.student') }}" class="btn btn-secondary mt-3">Back to Courses</a>
            <a href="{{ route('courses.student') }}" class="btn btn-primary mt-3">Contents</a>
        </div>
    </div>
</div>
@endsection


@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<style>
    :root {
        --primary-color: #3b7ddd;
        --secondary-color: #6c757d;
        --soft-background: #f8f9fa;
    }

    body {
        background-color: var(--soft-background);
        color: #333;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, var(--primary-color), #4a6cf7);
    }

    .course-card {
        overflow: hidden;
        transition: all 0.3s ease;
        transform-origin: center;
    }

    .course-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 35px rgba(0,0,0,0.12) !important;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    .shadow-hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.06);
    }

    .alert-soft-success {
        background-color: rgba(59, 125, 221, 0.1);
        border-color: transparent;
        color: #3b7ddd;
    }

    .btn-outline-light {
        color: white;
        border-color: rgba(255,255,255,0.5);
    }

    .btn-outline-light:hover {
        background-color: rgba(255,255,255,0.2);
    }

    @media (max-width: 768px) {
        .course-card {
            transform: none;
        }
        .course-card:hover {
            transform: none;
        }
    }
</style>
@endpush
