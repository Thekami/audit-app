<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccesoController extends Controller
{

    public function index(Request $request){
        // \Illuminate\Support\Facades\Mail::to('thekamitorres@gmail.com')->send(new \App\Mail\AccessAuditEmail(5, \Carbon\Carbon::now()));

        // $user = \App\Models\User::find(Auth::user()->id);
        // $unauthorizedAccessCount = \App\Models\AccessAudit::where('nombre_usuario', $user->name)
        //     ->where('permitido', 0)
        //     ->count();

        // $mail = app(\App\Mail\AccessAuditEmail::class, [
        //     'unauthorizedAccessCount' => 5,
        //     'fecha' => \Carbon\Carbon::now() 
        // ]);

        // \Illuminate\Support\Facades\Mail::to('thekamitorres@gmail.com')->send($mail);

        return view('bienvenido', [
            'usuario' => Auth::user(),
            'vista' => $request->route()->getName()
        ]);
    }
}
