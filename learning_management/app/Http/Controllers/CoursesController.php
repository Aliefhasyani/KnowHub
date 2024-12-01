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
        'start_time'=>'required',
        'end_time'=>'required'
    ], [
        'name.required' => 'Course name is required.',
        'description.required' => 'Course description is required.',
        'teacher_name.required' => 'Teacher name is required.',
        
    ]);

   
    $course = Courses::findOrFail($id);

   
    $course->update($request->only(['name', 'description', 'teacher_name','start_time','end_time']));

   
    return redirect()->route('coursesView')->with('success', 'Course updated successfully.');
}
    public function studentCourses()
    {
        $courses = Courses::withCount(['users as student_count' => function ($query) {
            $query->where('course_user.role', 'student');
    
        }   ])->get();

        return view('coursesViewStudent', compact('courses'));
    }



    public function enroll($id)
    {
    $user = Auth::user(); 
    $course = Courses::findOrFail($id); 

    
    if ($course->users()->where('user_id', $user->id)->exists()) {
        return redirect()->back()->with('success', 'You are already enrolled in this course.');
    }

    
    $course->users()->attach($user->id, ['role' => 'student']);

    return redirect()->back()->with('success', 'Successfully enrolled in the course!');
    }




    public function homepage()
    {
        $topCourses = Courses::withCount(['users as student_count' => function ($query) {
            $query->where('course_user.role', 'student'); 
        }])
        ->orderBy('student_count', 'desc')
        ->take(5)
        ->get();
    
        return view('homepage', compact('topCourses'));
    }

    public function show($id)
    {
      
        $course = Courses::findOrFail($id);
    
      
        return redirect()->route('coursesViewStudent');
    }

    public function showDetails($id){
        $course = Courses::findOrFail($id);

        return view('coursesDetails');
    }

    
    
    

}