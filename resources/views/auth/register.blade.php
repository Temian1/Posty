@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="p-6 bg-white rounded-sm ">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('name') border-red-400 @enderror" type="text" name="name" id="name" placeholder="Your name" value="{{ old('name') }}" >

                @error('name')
                    <div class="text-sm mt-2 text-red-400">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="username" class="sr-only">UserName</label>
                <input class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('username') border-red-400 @enderror" type="text" name="username" id="username" placeholder="UserName" value="{{ old('username') }}">

                @error('username')
                    <div class="text-sm mt-2 text-red-400">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('email') border-red-400 @enderror" type="email" name="email" id="email" placeholder="email" value="{{ old('email') }}">

                @error('email')
                    <div class="text-sm mt-2 text-red-400">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('password') border-red-400 @enderror" type="password" name="password" id="password" placeholder="Choose a password" value="">

                @error('password')
                    <div class="text-sm mt-2 text-red-400">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="sr-only">Confirm Password</label>
                <input class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('name') border-red-400 @enderror" type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-enter the password" value="">
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-400 px-4 py-3 font-medium rounded-md text-white">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
