@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="p-6 bg-white rounded-sm w-8/12">
            <div class="">
                <h1 class="text-2xl text-blue-500 font-extrabold pb-3">{{ $user->name }}</h1>
                <h1 class="text-md text-blue-400 pb-10">Posted {{ $user->posts()->count() }} {{ Str::plural('post', $posts->count())}} and received total {{ $user->totalLikes()->count() }} likes</h1>
            </div>
            @if ($posts->count())
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
            {{ $posts->links() }}
            @else
                <p class="text-gray-500 border-s-2 border-red-400 ps-4">No post is created</p>                
            @endif
        </div>
    </div>
@endsection