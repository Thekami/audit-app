<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccesoController extends Controller
{
    public function index(){
        return view('bienvenido', [
            'usuario' => Auth::user(),
            'vista' => 'index'
        ]);
    }
}
