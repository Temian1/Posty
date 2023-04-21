<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }

    public function index() {
        $posts = Post::with(['user', 'likes'])
        ->leftJoin('statuses', function($join) {
            $join->on('statuses.model_id', '=', 'posts.id')
                ->where('statuses.model_type', '=', Post::class)
                ->where('statuses.name', '=', 'approved');
        })
        ->withCount(['comments', 'likes'])
        ->orderByDesc('likes_count')
        ->orderByDesc('comments_count')
        ->latest()
        ->paginate(5);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    // public function store(Request $request) {
    //     $this->validate($request, [
    //         'body' => 'required'
    //     ]);
    //     $request->user()->posts()->create($request->only('body'));

    //     return back();
    // }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $is_anon = $request->input('is_anon') == 1 ? 1 : 0;
        $postData = [
            'body' => $request->input('body'),
            'is_anon' => $is_anon
        ];

        $post = $request->user()->posts()->create($postData);

       $post->setStatus('published', 'Story awaiting approval by moderator');

        return back();
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
