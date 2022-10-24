@extends('layouts.app')

@section('titulo')
    Crear una nueva publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form 
                id="dropzone" 
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" 
                action="{{ route('imagenes.store') }}"
                method="post"
                enctype="multipart/form-data"
            >
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-2xl mt-10 md:mt-0">
            <form name="form_ps" action="{{ route('posts.store') }}" method="POST" novalidate>
                @method('POST')
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Título
                    </label>
                    <input 
                        type="text" 
                        id="titulo"
                        name="titulo"
                        placeholder="Título de la publicación"
                        class="border  p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{ old('titulo') }}"
                        
                    >   
                    @error('titulo')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción de la publicación
                    </label>
                    <textarea
                        type="text" 
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la publicación"
                        class="border  p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                        
                    >{{ old('descripcion') }}</textarea>   
                    @error('descripcion')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input 
                        type="hidden"
                        name="imagen"
                        value="{{ old('imagen') }}"
                    >
                    @error('imagen')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <input 
                    type="submit" 
                    value="Publicar" 
                    class="w-full text-white bg-sky-500 rounded-md p-2 cursor-pointer"
                >
            </form>
        </div>
    </div>
@endsection 