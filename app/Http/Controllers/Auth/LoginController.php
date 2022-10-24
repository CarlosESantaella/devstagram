<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->remember);
        //validar datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //verificar si el email y password son correctos

        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }


        // si se valida que los datos son correctos lleva al muro de devstagram

        return redirect()->route('posts.index', [ 'user' => auth()->user()->username]);
    }
}
