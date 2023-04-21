@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="p-2  rounded-sm m-2">
            @auth
            <form action="{{ route('posts') }}" method="post" class="mb-3" x-data="{ wordCount: 0, maxWords: 400 }">
                @csrf
                <label for="body"></label>
                <textarea name="body" id="body"
                          cols="30" rows="4"
                          class="bg-gray-100 border-2 w-full p-4 rounded-md @error('body') border-red-400 @enderror"
                          placeholder="Post something (max 400 words)"
                          x-on:input="wordCount = $event.target.value.trim().split(/\s+/).length"
                          x-bind:class="{ 'border-red-400': wordCount > maxWords }"
                          maxlength="400"></textarea>

                <div class="flex justify-between mt-2" x-show="wordCount > 0">
                    <div class="flex flex-col">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_anon" id="is_anon" value="1" class="mr-2" />
                            <label for="is_anon">Post Anonymously</label>
                        </div>
                        <div class="flex items-center text-xs" x-bind:class="{ 'text-red-400': wordCount > maxWords }">
                            Word Count: <span x-text="wordCount"></span>/<span x-text="maxWords"></span>
                        </div>
                    </div>
                    <div>
                        <span x-show="wordCount > maxWords" class="text-red-400">Exceeded Limit!</span>
                        <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded-md font-medium">Post</button>
                    </div>
                </div>

                @error('body')
                    <div class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </div>
                @enderror

                <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
            </form>
            @endauth

            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />

                    <!-- Retrieve the last 3 comments of the post -->
 @php
 $last_3_comments = $post->comments()->latest()->take(2)->get();
@endphp

<!-- Iterate over the last 3 comments and do something with each comment -->
<div class="timeline border-l border-gray-300 mt-4 ml-4">
    @foreach ($last_3_comments as $comment)
        <div class="relative">
            <div class="comment bg-white p-2 mb-2 rounded-xl ml-2 space-y-1">
                <p class="font-bold capitalize"> {{ $comment->user->name }} at <span class="text-gray-400 text-xs">{{ $comment->created_at->format('M d, Y \a\t h:i a') }}</span></p>
                <p class="text-sm line-clamp-2">{{ $comment->body }}</p>

            </div>
            <div class="border-l-2 border-gray-300 absolute h-full left-0 top-0"></div>
        </div>
    @endforeach
</div>
                @endforeach
                {{ $posts->links() }}
            @else
                <p class="text-gray-500 border-s-2 border-red-400 ps-4">No post is created</p>
            @endif
        </div>
    </div>
@endsection
