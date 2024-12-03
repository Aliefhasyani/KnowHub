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
      
        $courses = Courses::all(); 
    
   
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
   
    public function deleteContent($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('contentManage')->with('success', 'Content deleted successfully.');
    }

    public function updateContentForm($id)
    {
        $content = Content::findOrFail($id);
        return view('updateContent', compact('content'));
    }
    
    public function updateContent(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ], [
            'title.required' => 'Content title is required.',
            'content.required' => 'Content is required.',
        ]);
    
        $content = Content::findOrFail($id);
        $content->update($request->only(['title', 'content']));
    
        return redirect()->route('contentManage')->with('success', 'Content updated successfully.');
    }

  
    

}


