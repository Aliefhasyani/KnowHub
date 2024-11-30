<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #6c757d;
            --background-color: #f4f6f9;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            max-width: 500px;
            margin: 3rem auto;
            transition: all 0.3s ease;
        }

        .form-container:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #e1e5eb;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #3a7bd5;
            border-color: #3a7bd5;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(58, 123, 213, 0.3);
        }

        .form-title {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 700;
            text-align: center;
        }

        .error-container {
            background-color: #f8d7da;
            border-left: 5px solid #dc3545;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 4px;
        }

        .error-container ul {
            margin-bottom: 0;
            padding-left: 1.25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Create New Course</h2>

            @if($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('courses.create') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ Session::get('name') }}" 
                           class="form-control @error('name') is-invalid @enderror" 
                           placeholder="Enter course name"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Course Description</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        class="form-control @error('description') is-invalid @enderror" 
                        placeholder="Provide a brief description of the course"
                        rows="3"
                        required></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="start_time" class="form-label">Start Date</label>
                        <input type="date" 
                               id="start_time" 
                               name="start_time" 
                               class="form-control @error('start_time') is-invalid @enderror"
                               required>
                        @error('start_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="end_time" class="form-label">End Date</label>
                        <input type="date" 
                               id="end_time" 
                               name="end_time" 
                               class="form-control @error('end_time') is-invalid @enderror"
                               required>
                        @error('end_time')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Create Course
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Optional: Add client-side date validation
        document.addEventListener('DOMContentLoaded', function() {
            const startDateInput = document.getElementById('start_time');
            const endDateInput = document.getElementById('end_time');

            endDateInput.addEventListener('change', function() {
                if (new Date(startDateInput.value) > new Date(endDateInput.value)) {
                    endDateInput.setCustomValidity('End date must be after start date');
                } else {
                    endDateInput.setCustomValidity('');
                }
            });
        });
    </script>
</body>
</html>