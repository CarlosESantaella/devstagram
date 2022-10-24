@extends('layouts.app')

@section('titulo', $post->titulo)


@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2 p-5">
            <img class="w-full" src="{{ asset('uploads/'.$post->imagen) }}" alt="Imagen del post {{ $post->titulo }}">
            <div class="p-3">
                <div class="p-3  gap-2">
                    @auth

                        {{-- <livewire:like-post :mensaje="$mensaje" /> --}}
                        @livewire('like-post', ['post' => $post])
                        {{-- @if($post->checkLike(auth()->user()))
                            <form action="{{ route('posts.likes.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="my-4">

                                </div>
                            </form>
                        @else
                            <form action="{{ route('posts.likes.store', $post->id) }}" method="POST">
                                @csrf
                                <div class="my-4">
                                    <button type="submit">

                                        <svg class="w-6 h-6" fill="white" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                    </button>
                                </div>
                            </form>

                        @endif --}}
                    @endauth

                </div>
            </div>
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>
            @auth
                @if (auth()->user()->id == $post->user_id)
                    
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input 
                            type="submit" 
                            value="Eliminar Publicación" 
                            class="bg-red-500 hover:bg-red-600 p-2 rounded font-bold mt-4 cursor-pointer text-white"
                        >

                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4 ">
                    agrega un nuevo comentario
                </p>
                @if(session('mensaje'))
                    <p class="alert alert-green">
                        {{ session('mensaje') }}
                    </p>
                @endif
                <form action="{{ route('comentarios.store', ['post' => $post]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="">
                    <input type="hidden" name="user_id" value="">
                    <div class="mb-5">
                        <label 
                            for=""
                            class="mb-2 block uppercase text-gray-500 font-bold"
                        >
                            Añade un comentario
                        </label>
                        <textarea
                            type="text" 
                            id="comentario"
                            name="comentario"
                            placeholder="Agrega un comentario"
                            class="border  p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"
                            
                        ></textarea>   
                        @error('comentario')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <input 
                        type="submit" 
                        value="Comentar" 
                        class="w-full text-white bg-sky-500 rounded-md p-2 cursor-pointer"
                    >
                </form>
                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b" data-id="{{ $comentario->id }}">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-400">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios aún</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection