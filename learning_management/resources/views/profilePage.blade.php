@extends('layout.layout')

@section('content')
<div class="container-fluid px-4 py-5">
    <div class="row">
        <div class="col-12 col-lg-10 offset-lg-1">
           
                <div class="flex-grow-1">
                    <h1 class="display-6 mb-2">{{ $user->name }}</h1>
                    <div class="text-muted">
                        <i class="fas fa-envelope me-2"></i>{{ $user->email }}
                        <span class="mx-2">•</span>
                        <span class="badge bg-secondary">{{ $user->role }}</span>
                    </div>
                </div>
            </div>

        
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 pt-4 pb-2">
                    <h2 class="h4 mb-0">My Enrolled Courses</h2>
                </div>
                <div class="card-body pt-0">
                    @if($courses->isEmpty())
                        <div class="alert alert-light text-center" role="alert">
                            <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                            <p class="lead mb-0">You are not enrolled in any courses yet.</p>
                            <a href="{{ route('courses.catalog') }}" class="btn btn-primary mt-3">
                                Explore Courses
                            </a>
                        </div>
                    @else
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach($courses as $course)
                                <div class="col">
                                    <div class="card h-100 border-0 shadow-sm hover-lift">
                                        <div class="card-header bg-gradient-primary text-black py-3">
                                            <h5 class="card-title mb-0">{{ $course->name }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text text-muted mb-3">
                                                {{ Str::limit($course->description, 120) }}
                                            </p>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <i class="fas fa-chalkboard-teacher text-muted"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <small class="text-muted">
                                                        Instructor: {{ $course->teacher_name }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white border-0 pt-0 pb-3">
                                            <a href="{{ route( 'detail', $course->id) }}" 
                                               class="btn btn-outline-primary btn-sm w-100">
                                                View Course Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Optional: Add any interactive elements or animations
    });
</script>
@endpush