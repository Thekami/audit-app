<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index(){
      return view('auth.login');
    }
    public function login(Request $request){
        
        try {

            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if(Auth::attempt($credentials)){

                return redirect()->route('crear');
            }
            
            return back()->with(['login_error' => 'Credenciales incorrectas']);
            
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
