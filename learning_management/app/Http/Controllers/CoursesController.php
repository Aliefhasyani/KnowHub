<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{   
    public function index()
    {
        $user = Auth::user();
    
        
        $courses = Courses::with('creator')->get();
    
        return view('coursesView', compact('courses'));
    }

  

    public function showCreateForm()
    {
        return view('createCourse');
    }
    
    
    public function createCourse(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            
        ], [
            'name.required' => 'Course name is required',
            'description.required' => 'Course description is required',
        ]);
    
        $course = Courses::create([
            'name' => $request->name,
            'description' => $request->description,
            'teacher_name' => Auth::user()->name,
            'teacher_id' => Auth::id(),
            'start_time'=> $request->start_time,
            'end_time' => $request->end_time
        ]);
    
        $course->users()->attach(Auth::id(), ['role' => 'teacher']);
    
        return redirect()->route('coursesView')->with('success','Course added successfully');
    }
    



    public function deleteCourse($id)
    {
        $user = Auth::user();
        $course = Courses::findOrFail($id);

        if ($user->role === 'admin' || ($user->role === 'teacher' && $course->teacher_id == $user->id)) {
            $course->delete();
            return redirect()->route('coursesView');
        }

        return redirect()->route('coursesView')->with('success', 'Course deleted successfully.');
    }

    public function updateCourseForm($id)
    {
        $course = Courses::findOrFail($id);
        return view('coursesUpdate', compact('course'));
    }
    

    public function updateCourse(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'teacher_name' => 'required|string|max:255',
    ], [
        'name.required' => 'Course name is required.',
        'description.required' => 'Course description is required.',
        'teacher_name.required' => 'Teacher name is required.',
        
    ]);

   
    $course = Courses::findOrFail($id);

   
    $course->update($request->only(['name', 'description', 'teacher_name']));

   
    return redirect()->route('coursesView')->with('success', 'Course updated successfully.');
}

    public function studentCourses(){
        $courses = Courses::get();
        
        return view('coursesViewStudent', compact('courses'));
    }

}