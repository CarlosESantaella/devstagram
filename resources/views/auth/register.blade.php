@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-2xl">
            <form name="form" action="{{ route('register') }}" method="POST" novalidate>
                @method('POST')
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                        type="text" 
                        id="name"
                        name="name"
                        placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}"
                        
                    >   
                    @error('name')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre de usuario
                    </label>
                    <input 
                        type="text" 
                        id="username"
                        name="username"
                        placeholder="Tu Username"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}"
                    >   
                    @error('username')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input 
                        type="text" 
                        id="email"
                        name="email"
                        placeholder="Tu Email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"

                    >   
                    @error('email')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input 
                        type="password" 
                        id="password"
                        name="password"
                        placeholder="Tu password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                        value="{{ old('password') }}"

                    >   
                    @error('password')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir password_confirmation
                    </label>
                    <input 
                        type="password" 
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu password"
                        class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror"
                        value="{{ old('password_confirmation') }}"

                    >   
                    @error('password_confirmation')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </div>
                <input 
                    type="submit" 
                    value="Crear cuenta" 
                    class="w-full text-white bg-sky-500 rounded-md p-2 cursor-pointer"
                >
            </form>
        </div>
    </div>
@endsection