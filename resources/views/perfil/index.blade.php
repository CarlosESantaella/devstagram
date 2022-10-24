@extends('layouts.app')

@section('titulo', 'Editar Perfil: '.auth()->user()->username)


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" class=" mt-10 md:mt-0" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        type="text" 
                        id="username"
                        name="username"
                        placeholder="Tu Nombre e usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}"
                        
                    >   
                    @error('username')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        type="text" 
                        id="email"
                        name="email"
                        placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ auth()->user()->email }}"
                        
                    >   
                    @error('email')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña Actual
                    </label>
                    <input 
                        type="text" 
                        id="password"
                        name="password"
                        placeholder="Tu contraseña actual"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                        value=""
                        
                    >   
                    @error('password')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                    @if(session('mensaje'))
                        <p class="text-red-500">{{session('mensaje')}}</p>


                    @endif
                </div>
                <div class="mb-5">
                    <label for="password_new" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña Nueva
                    </label>
                    <input 
                        type="text" 
                        id="password_new"
                        name="password_new"
                        placeholder="Tu contraseña nueva"
                        class="border p-3 w-full rounded-lg @error('password_new') border-red-500 @enderror"
                        value=""
                        
                    >   
                    @error('password_new')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen de Perfil
                    </label>
                    <input 
                        id="imagen"
                        name="imagen"
                        type="file" 
                        class="border p-3 w-full rounded-lg @error('imagen') border-red-500 @enderror"
                        value=""
                        accept=".jpg, .jpeg, .png"
                    >   
                    @error('imagen')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <input 
                    type="submit" 
                    value="Guardar cambios" 
                    class="w-full text-white bg-sky-500 rounded-md p-2 cursor-pointer"
                >
            </form>
        </div>
    </div>
@endsection