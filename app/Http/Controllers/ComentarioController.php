<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // dd(auth()->user()->username);
        
        //validar
        $request->validate([
            'comentario' => 'required|max:255',
        ]);

        //almacenar el resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario,
        ]);

        //imprimir mensaje

        return redirect()->back()->with('mensaje', 'Comentario realizado correctamente');
    }
}
