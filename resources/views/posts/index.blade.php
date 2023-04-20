@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="p-2  rounded-sm m-2">
            @auth
            <form action="{{ route('posts') }}" method="post" class="mb-3">
                @csrf
                <label for="body"></label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-md @error('body') border-red-400 @enderror" placeholder="Post something"></textarea>

                <div class="mt-2">
                    <input type="checkbox" name="is_anon" id="is_anon" value="1">
                    <label for="is_anon">Post Anonymously</label>
                </div>

                @error('body')
                    <div class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mt-3">
                    <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded-md font-medium">Post</button>
                </div>
            </form>

            @endauth

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
