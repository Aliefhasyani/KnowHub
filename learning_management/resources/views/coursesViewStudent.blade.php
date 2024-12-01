@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-5">
   
    <div class="row mb-5 align-items-center bg-gradient-primary rounded-4 p-4 shadow-lg">
        <div class="col-md-8">
            <h1 class="display-5 fw-bold text-white mb-3">My Learning Dashboard</h1>
            <p class="lead text-white-75" style="color: white " >Manage your courses, track your progress, and explore new learning opportunities.</p>
        </div>
        <div class="col-md-4 text-end">
            <div class="d-flex flex-column gap-3">
                @if(Auth::user())
                <a href="/logout" class="btn btn-outline-danger btn-lg d-flex align-items-center justify-content-center">
                    <i class="bi bi-box-arrow-right me-2"></i>Log Out
                </a>
                @endif
            </div>
        </div>
    </div>

   
    @if(session('success'))
        <div class="alert alert-primary-success alert-dismissible fade show mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3 text-success"></i>
                <div>
                    <h5 class="alert-heading mb-1">Success</h5>
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    
    @if($courses->isEmpty())
        <div class="text-center py-5 bg-light rounded-4">
            <i class="bi bi-journal-x display-3 text-muted mb-3"></i>
            <h2 class="text-muted">No Courses Available</h2>
            <p class="lead text-muted ">Start your learning journey by creating a new course</p>
            
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($courses as $course)
                <div class="col">
                    <div class="card course-card border-0 h-100 shadow-hover transition-all">
                       
                        <div class="card-header bg-gradient-primary text-white py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0 fw-bold" style="color: white">{{ $course->name }}</h4>
                                <span class="badge bg-light text-primary">ID: {{ $course->id }}</span>
                            </div>
                        </div>

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

                        @if (Auth::check() && Auth::user()->role === 'student')
                        <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary mt-3">Enroll</button>
                        </form>
                        @endif
                        <div >
                            <a href="{{ route('detail', $course->id) }}" >
                                <button type="submit" class="btn btn-primary mt-3">View Details</button>
                            </a>
                        </div>

                      
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@endsection