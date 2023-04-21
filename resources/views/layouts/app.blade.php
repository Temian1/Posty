<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posty</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <x-comments::styles />
</head>
<body class="bg-slate-100">
    <nav class="p-2 bg-white flex justify-between mb-3 text-lg text-gray-500 shadow-sm">
        <ul class="flex items-center">
            <li class="p-3"><a href="{{ route('home') }}"><img src="https://img.freepik.com/free-vector/bird-colorful-gradient-design-vector_343694-2506.jpg" alt="" height="40em" width='40em'></a> </li>
            {{-- <li class="p-3"><a href="{{ route('dashboard') }}">Dashboard</a> </li> --}}
            <li class="p-3"><a href="{{ route('posts') }}">Explore</a> </li>
        </ul>

        <ul class="flex items-center">
            @auth
            <li class="p-3"><a href="">{{ auth()->user()->username }}</a> </li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-400 text-white p-2">Logout</button>
            </form>
            @endauth

            @guest
            <li class="p-3"><a href="{{ route('register') }}">Register</a> </li>
            <li class="p-3"><a href="{{ route('login') }}">Login</a> </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
    @livewireScripts
    <x-comments::scripts />
</body>
</html>
