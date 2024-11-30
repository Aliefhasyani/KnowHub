<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
Route::middleware(['guest'])->group(function () {
    
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/', [SessionController::class, 'login']);
    Route::get('/register', [SessionController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [SessionController::class, 'create']);
});


Route::get('/homepage', [CoursesController::class, 'homepage'])->name('homepage');

Route::get('/coursesViewStudent',[CoursesController::class,'studentCourses'])->name('courses.student');





Route::middleware(['auth'])->group(function () {
    
    Route::get('/usersView', [StudentController::class, 'index'])->middleware('UserAccess:admin')->name('usersView');
    
    
    Route::get('/teacher', [SessionController::class, 'teacher'])->name('teacher')->middleware('UserAccess:teacher,admin');
    
    Route::get('/admin', [SessionController::class, 'admin'])->middleware('UserAccess:admin');
    
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->middleware('UserAccess:admin')->name('students.destroy');
    
    Route::get('/students/{id}/edit', [StudentController::class, 'showEditForm'])->middleware('UserAccess:admin')->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->middleware('UserAccess:admin')->name('students.update');
    
    Route::get('/create', [AdminController::class, 'showCreateForm'])->middleware('UserAccess:admin')->name('students.create');
    Route::post('/create', [AdminController::class, 'createForAdmin'])->middleware('UserAccess:admin')->name('students.create');
    
    Route::get('/coursesView',[CoursesController::class,'index'])->middleware('UserAccess:admin,teacher')->name('coursesView');
    
    
    Route::get('/coursesUpdate/{id}/edit', [CoursesController::class, 'updateCourseForm'])->middleware('UserAccess:admin,teacher')->name('courses.updateForm');
    Route::put('/coursesUpdate/{id}', [CoursesController::class, 'updateCourse'])->middleware('UserAccess:admin,teacher')->name('courses.update');
    
    
    Route::get('/createCourse', [CoursesController::class, 'showCreateForm'])->middleware('UserAccess:admin,teacher')->name('courses.create');
    Route::post('/createCourse', [CoursesController::class, 'createCourse'])->middleware('UserAccess:admin,teacher')->name('courses.create');
    
    Route::delete('/courses/{id}', [CoursesController::class, 'deleteCourse'])->middleware('UserAccess:admin,teacher')->name('courses.destroy');
    
    Route::get('/course/{id}', [CoursesController::class, 'show'])->name('course.details');

    Route::post('/courses/enroll/{id}', [CoursesController::class, 'enroll'])->name('courses.enroll');

    Route::get('/coursesDetails/{id}',[CoursesController::class,'showDetails'])->name('detail');

   
 

        
    
    
    Route::get('/student', [SessionController::class, 'student']);
    Route::get('/logout', [SessionController::class, 'logout']);
});

