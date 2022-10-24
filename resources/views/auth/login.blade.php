@extends('layouts.app')

@section('titulo')
    Inicia Sesión en DevStagram
@endsection

@section('contenido')

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-2xl">
            <form action="{{ route('login') }}" method="post" novalidate>
                @method('POST')
                @csrf

                @if(session('mensaje'))
                    <p class="text-white text-center bg-red-500 rounded-sm text-ms p-2 my-2">{{ session('mensaje') }}</p>
                @endif
                

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
                    <input class="" type="checkbox" name="remember"> <label class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
                </div>
                <input 
                    type="submit" value="Iniciar Sesión" class="w-full text-white bg-sky-500 rounded-md p-2 cursor-pointer">
            </form>
        </div>
    </div>
@endsection