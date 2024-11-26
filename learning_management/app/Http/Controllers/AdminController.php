<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use GuzzleHttp\RedirectMiddleware;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    

    function createForAdmin(Request $request){
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
       return redirect()->route('usersView')->with('success', 'User added successfully.');
    }

    public function showCreateForm(){
        return view('create');
    }
}
