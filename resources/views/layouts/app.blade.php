<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DevStagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="{{ Vite::asset('css/app.css'); }}">
    <script src="{{ Vite::asset('js/app.js'); }}" defer></script> --}}
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    

    @stack('styles')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @livewireStyles
</head>

<body class="antialiased" >
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between">
            @auth
                <a class="text-3xl font-black" href="{{ route('home') }}">
            @endauth
            @guest
                <a class="text-3xl font-black" href="{{ route('home') }}">
            @endguest
                DevStagram
            </a>
            {{-- @if (auth()->user())
                <p>Autenticado</p>
            @else
                <p>No autenticado</p>
            @endif --}}
            

            @auth
                <nav class="flex gap-5 items-center">
                    <a 
                        href="{{ route('posts.create') }}"
                        class="flex items-center gab-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-1">
                            <path fill-rule="evenodd" d="M1 8a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 018.07 3h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0016.07 6H17a2 2 0 012 2v7a2 2 0 01-2 2H3a2 2 0 01-2-2V8zm13.5 3a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM10 14a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                      
                      
                        Crear
                    </a>
                    <a class="font-bold text-gray-600 text-sm" href="{{ route('posts.index', ['user' => auth()->user()->username]) }}">
                        Hola: 
                        <span class="font-normal">{{ auth()->user()->username }}</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                            Cerrar Sesión
                        </button>
                    </form>
                </nav>
            @endauth
            @guest
                <nav class="flex gap-5 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">
                        Crear Cuenta
                    </a>
                </nav>
            @endguest
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>
    <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
        DevStagram - Todos los derechos reservados {{ NOW()->year }}
    </footer>
    @vite('resources/js/app.js')
    @livewireScripts
</body>

</html>
