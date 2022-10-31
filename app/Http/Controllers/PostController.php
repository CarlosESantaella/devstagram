<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth'])->except(['show', 'index']);
    }

    public function index(User  $user)
    {
        // $posts = Post::where('user_id', $user->id)->paginate(5);
        // $posts = Post::where('user_id', $user->id)->get();
        
        $posts = Post::where('user_id', $user->id)->latest()->paginate(15);

        // $posts = auth()->user()->posts()->where('titulo','like','M%')->get();

        // foreach($posts as $post){
        //     echo $post->titulo.'<br>';
        // }

        // die();
        
        // dd($posts);
        // dd($user);
        // dd(auth()->user()->email);
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        

        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        Post::create(([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,  
        ]));

        //Otra forma de realizar insert de datos

        // $post = new Post;

        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;

        // $request->user()->posts()->create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id, 
        // ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {


        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {   
        //    Post::destroy($post->id);
        //eliminar el post

        $this->authorize('delete', $post);
        $post->delete();

        //elminar imagen adjunta del post

        $imagen_path = public_path('uploads/'.$post->imagen);

        if(File::exists($imagen_path)){
            unlink($imagen_path);
            
        }
        die('hola mundo');

        return redirect()->route('posts.index', auth()->user()->username);


    }
}
