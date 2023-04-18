@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="p-6 bg-white rounded-sm w-5/12">
        @if (session('status'))
        <div class="text-center text-red-700 bg-blue-200 py-2 rounded-md my-3">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('email') border-red-400 @enderror" type="email" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">

                @error('email')
                    <div class="text-sm mt-2 text-red-400">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('password') border-red-400 @enderror" type="password" name="password" id="password" placeholder="Enter password" value="">

                @error('password')
                    <div class="text-sm mt-2 text-red-400">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember">Remember Me</label>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-400 px-4 py-3 font-medium rounded-md text-white">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection