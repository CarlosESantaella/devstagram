<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Vite;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Varlidar que el usuario no este logueado
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function index() {


        return view('auth.register');
    }
    public function store(Request $request)
    {

        
        //modificar el request

        $request->merge(['username' => Str::slug($request->username)]);

        //validar datos
        $validate = $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        //insertar datos
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //autenticar un usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        //otra forma de autenticas

        auth()->attempt($request->only('email', 'password'));

        //redireccionar
        return redirect()->route('posts.index', $request->username);
    }
}

