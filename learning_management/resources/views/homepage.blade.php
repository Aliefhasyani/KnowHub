@extends('layout.layout')


<style>
    :root {
        --primary-color: #4a90e2;
        --secondary-color: #6c757d;
        --background-color: #f4f6f9;
        --card-hover-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    }

    .courses-container {
        background-color: var(--background-color);
        min-height: 100vh;
        padding-top: 4rem;
    }

    .courses-title {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 2.5rem;
        text-align: center;
        position: relative;
    }

    .courses-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 4px;
        background-color: var(--primary-color);
        border-radius: 2px;
    }

    .course-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--card-hover-shadow);
    }

    .course-card .card-header {
        background: linear-gradient(to right, #4a90e2, #6a11cb);
        color: white;
        padding: 1.25rem;
        border-bottom: none;
    }

    .course-card .card-header h4 {
        margin-bottom: 0;
        font-weight: 600;
    }

    .course-card .card-body {
        padding: 1.5rem;
        background-color: white;
    }

    .course-card .card-body p {
        color: var(--secondary-color);
        margin-bottom: 0.75rem;
    }

    .course-card .card-footer {
        background-color: white;
        border-top: 1px solid rgba(0,0,0,0.075);
        padding: 1rem 1.5rem;
    }

    .btn-view-course {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        font-weight: 600;
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-view-course:hover {
        background-color: #3a7bd5;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(58, 123, 213, 0.3);
    }

    .no-courses-message {
        text-align: center;
        color: var(--secondary-color);
        font-size: 1.25rem;
        margin-top: 3rem;
    }


</style>
@section('content')
<div class="container-fluid courses-container">
    <h1 class="display-6 courses-title" style="color: black">Top 5 Popular Courses</h1>

    @if ($topCourses->isEmpty())
        <div class="no-courses-message">
            <i class="fas fa-graduation-cap mb-3" style="font-size: 3rem; color: var(--secondary-color);"></i>
            <p>No courses are available at the moment.</p>
            <p class="text-muted">Check back soon for exciting new learning opportunities!</p>
        </div>
    @else
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($topCourses as $course)
                    <div class="col">
                        <div class="card course-card h-100">
                            <div class="card-header">
                                <h4>{{ $course->name }}</h4>
                            </div>
                            <div class="card-body">
                                <p class="course-description">
                                    <i class="fas fa-quote-left text-muted me-2"></i>
                                    {{ Str::limit($course->description, 100) }}
                                    <i class="fas fa-quote-right text-muted ms-2"></i>
                                </p>
                                <hr class="my-3">
                                <div class="course-details">
                                    <p class="mb-2">
                                        <i class="fas fa-users me-2 text-primary"></i>
                                        <strong>Students Enrolled:</strong> 
                                        {{ number_format($course->student_count) }}
                                    </p>
                                    <p>
                                        <i class="fas fa-chalkboard-teacher me-2 text-success"></i>
                                        <strong>Instructor:</strong> 
                                        {{ $course->teacher_name }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('courses.student', $course->id) }}" class="btn btn-view-course w-100">
                                    <i class="fas fa-eye me-2"></i>View Course Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
@push('scripts')
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
@endpush