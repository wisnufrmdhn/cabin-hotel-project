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
        return view('login');
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
                if ($user->role_id == '1') {
                    return redirect()->intended('superadmin');
                } elseif ($user->role_id == '2') {
                    return redirect()->intended('admin');
                }
                return redirect()->intended('/');
            }

        return redirect('/')->with('error', 'Login gagal karena akses login salah')->withInput();

        return redirect('/')->withInput()->withErrors('error', 'Worker failed to add cause password and confirm password not same');
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
