<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;




use App\Models\User;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        return view('usersView', compact('data'));
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id); 
        $student->delete(); 
        return redirect()->route('usersView')->with('success', 'Student deleted successfully.');
    }

    public function showEditForm($id)
    {
        $student = Student::find($id);
        return view('edit', compact('student'));
    }  
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|:users,email,' . $id,
           
            'role' => 'required|in:student,teacher',
        ],
        [   'name.required'=>'Nama wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.unique'=>'Email sudah terdaftar, gunakan email yang lain',
            'password.required'=>'Password wajib diisi',
            
    ]);
    
        $student = Student::findOrFail($id);
    
        $data = $request->only(['name', 'email', 'role']);
    
        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        $student->update($data);
    
        return redirect()->route('usersView')->with('success', 'Student updated successfully.');
    }
    
}

