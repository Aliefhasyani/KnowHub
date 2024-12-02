<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Content;


class ContentController extends Controller
{
    
    public function showContents()
    {
        $contents = Content::all();
        return view('contentManage', compact('contents'));
    }

    
    public function showCreateForm()
    {
        // Fetch all courses
        $courses = Courses::all(); 
    
        // Pass the courses to the view
        return view('createContent', compact('courses'));
    }
    
    public function createContent(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content'=>'required'
        
    ], [
        'title.required' => 'Content Title is required',
        'content.required' => 'Content is required',
        
    ]);

   
    $contents = Content::create([
        'title' => $request->title,
        'description' => $request->description,
        'content' => $request->content,
        
    ]);

    return redirect()->route('contentManage')->with('success', 'Content added successfully');
}






}




