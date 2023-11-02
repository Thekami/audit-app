<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index(){
      return Auth::check() ? redirect('/') : view('auth.login');
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
            logger($e->getMessage());
            return back()->with(['login_error' => 'Ocurrió un error inesperado, intentelo mas tarde']);
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
