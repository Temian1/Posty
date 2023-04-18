@extends('layouts.app')

@section('content')
    <div class="flex justify-center ">
        <div class=" bg-white rounded-sm w-10/12 flex shadow-sm">
            <div class="px-16 flex justify-center items-start flex-col ">
                <h1 class="text-blue-600 font-extrabold text-3xl mb-3">Posty</h1>
                <p class="text-gray-500 font-sans font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, in blanditiis? Fugit excepturi est impedit! Beatae magnam doloribus dolor amet?</p>
                <div class="mt-10 border-2 border-blue-200 bg-blue-500 text-white px-10 py-2 rounded-full">
                    <a href="{{ route('posts')}}">Explore</a>
                </div>
            </div>
            <div class="w-4/12 h-full border-2 border-blue-50">
                <img src="https://img.freepik.com/free-vector/bird-colorful-gradient-design-vector_343694-2506.jpg" alt="" height="220em" width='220em'>
            </div>
        </div>
    </div>
@endsection