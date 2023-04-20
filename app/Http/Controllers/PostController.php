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
        $post = Post::latest()->with(['user', 'likes'])->paginate(5);
        return view('posts.index', [
            'posts' => $post,
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

        $request->user()->posts()->create($postData);

        return back();
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
