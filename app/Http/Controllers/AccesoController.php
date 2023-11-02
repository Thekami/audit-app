<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccesoController extends Controller
{

    public function index(Request $request){
        return redirect()->route('crear')->with([
            'usuario' => Auth::user(),
            'vista' => $request->route()->getName()
        ]);
    }

    public function otherViews(Request $request){
        return view('bienvenido', [
            'usuario' => Auth::user(),
            'vista' => $request->route()->getName()
        ]);
    }
}
