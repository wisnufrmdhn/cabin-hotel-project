<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Hash;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
    
    public function loginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('email','password');
        $loginCheck = Auth::attempt($credential);

            if($loginCheck){
                $user = Auth::user();
                if ($user->role == 'admin') {
                    return redirect()->intended('admin');
                } elseif ($user->role == 'superadmin') {
                    return redirect()->intended('superadmin');
                }
                return redirect()->intended('/');
            }

        return redirect('/')->withInput()->withErrors(['login_failed' => 'Login failed email or password invalid']);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function logout(Request $request) 
    {
        $request->session()->flush();
        $logout = Auth::logout();
        return redirect('/');
    }
}
