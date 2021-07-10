<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('guest')->except(['logout','menu']); 
    }

    public function getLogin(){
        return view('admin.login');
    }

    public function login(){
        $credentials=$this->validate(request(),
        ['email'=>'email|required|string',
        'password'=>'required|string']);

        if (Auth::guard('web')->attempt($credentials)){ 
            return redirect(route('admin.cover.index'));
        }
        return back()
        ->withErrors(['email'=>'Estas credenciales no concuerdan con nuestros registros.'])
        ->withInput(request(['email']));
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect(route('admin.get_login'));
    }

    public function menu(){
        return view('admin.index');
    }

}
