<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
       return view('login');
  
    }

    function admin(){
        return view('admin');
    }
    function teacher(){
        return view('teacher');
    }
    
    
    function login(Request $request)
{
    Session::flash('email', $request->email);

    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ], [
        'email.required' => 'Email wajib diisi',
        'password.required' => 'Password wajib diisi',
    ]);

    $infologin = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($infologin)) {
        if (Auth::user()->role == 'admin') {
            return redirect('admin');
        } elseif (Auth::user()->role == 'teacher') {
            return redirect('teacher');
        } elseif (Auth::user()->role == 'student') {
            return redirect('homepage');
        }
    }

    return redirect()->route('login')->withErrors('Email atau Password tidak sesuai')->withInput();
}


    function logout(){
        Auth::logout();
        Session::flush();
        return redirect('');
    }
    

    function showRegisterForm(){
        return view('register');
    }

    function create(Request $request){
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        Session::flash('role',$request->role);
       
        $request->validate([
        'name'=>'required',
        'email'=>'required|unique:users',
        'password'=>'required',
        'role' => 'required|in:student,teacher',

       ], [
        'name.required'=>'Nama wajib diisi',
        'email.required'=>'Email wajib diisi',
        'email.unique'=>'Email sudah terdaftar, gunakan email yang lain',
        'password.required'=>'Password wajib diisi',
        'role.required'=>'Role wajib diisi',
       ]);

       $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        ];
  
    
       User::create($data);
       
       $infologin = [
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>$request->password,
           'role'=>$request->role,
   
       ];
       return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }
       
    
   
  
       
      

    

    

}
