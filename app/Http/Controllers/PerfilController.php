<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        //modificar request
        $request->merge(['username' => Str::slug($request->username)]);
        
        //realizar las validaciones
        if($request->password != ''){
            $request->validate([
                // 'username' => 'required|unique:users|min:3|max:20'
                'username' => [
                    'required', 
                    // "unique:users,username,{auth()->user()->username}", 
                    Rule::unique('users', 'username')->ignore(auth()->user()),
                    'min:3', 
                    'max:20', 
                    'not_in:twitter,edita-perfil'
                ],
                'email' => [
                    'required',
                    Rule::unique('users', 'email')->ignore(auth()->user()),
                    'min:5',
                    'email'
                ],
                'password_new' => 'required|min:6'
            ]);

            if(!auth()->attempt($request->only('email', 'password'))){
                return back()->with('mensaje', 'Contraseña incorrecta');
            }
        }else{

            $request->validate([
                // 'username' => 'required|unique:users|min:3|max:20'
                'username' => [
                    'required', 
                    // "unique:users,username,{auth()->user()->username}", 
                    Rule::unique('users', 'username')->ignore(auth()->user()),
                    'min:3', 
                    'max:20', 
                    'not_in:twitter,edita-perfil'
                ],
                'email' => [
                    'required',
                    Rule::unique('users', 'email')->ignore(auth()->user()),
                    'min:5',
                    'email'
                ]
            ]);
        }
        

        if($request->imagen)
        {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();
    
            $imagenServidor = Image::make($imagen);
    
            $imagenServidor->fit(1000, 1000);
    
            $imagenPath = public_path('perfiles/' . $nombreImagen);

            $imagenServidor->save($imagenPath);
        }

        //guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;

        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password_new) ?? auth()->user()->password;
        $usuario->save();

        //redireccionar

        return redirect()->route('posts.index', $usuario->username);

    }
}
