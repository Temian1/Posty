@props(['post' => $post ])

<div class="border-s-2 border-blue-400 ps-4 mb-3 bg-white rounded-xl p-2">
    @if($post->is_anon)
    <a  class="text-green-400 me-4"><strong>anonymous</strong></a><span class="text-gray-300">{{ $post->user->created_at->diffForHumans() }}</span>
    @else
    <a href="{{ route('users.posts', $post->user) }}" class="text-blue-400 me-4"><strong>{{ $post->user->username }}</strong></a><span class="text-gray-300">{{ $post->user->created_at->diffForHumans() }}</span>
    @endif

    <p class="py-2">{{ $post->body }}</p>
    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="pe-3 text-red-500">Delete</button>
        </form>
    @endcan
    <div class="flex">
        @auth
            @if (!$post->likedBy(auth()->user()))
            <form action="{{ route('posts.likes', $post->id) }}" method="post">
                    @csrf
                <button type="submit" class="pe-3 text-blue-500">Like</button>
            </form>
            @else
            <form action="{{ route('posts.likes', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="pe-3 text-blue-500">Unlike</button>
            </form>
            @endif
        @endauth
        <span class="text-gray-500">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count() )}}</span>
    </div>
</div>
