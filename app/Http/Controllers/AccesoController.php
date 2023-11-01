<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccesoController extends Controller
{

    public function index(Request $request){
        // \Illuminate\Support\Facades\Mail::to('thekamitorres@gmail.com')->send(new \App\Mail\AccessAuditEmail(5, 'ruta', \Illuminate\Support\Carbon::now()));

        return view('bienvenido', [
            'usuario' => Auth::user(),
            'vista' => $request->route()->getName()
        ]);
    }
}
