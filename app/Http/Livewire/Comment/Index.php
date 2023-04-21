<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use Livewire\Component;

class Index extends Component
{
    public $comment;
    public $is_anon;
    public $post; // added public property

    protected $rules = [
        'comment' => 'required|min:5|max:255',
    ];



    public function submitComment()
    {
        $this->validate();
        $is_anon = $this->is_anon == 1 ? 1 : 0;
        Comment::create([
            'body' => $this->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'is_anon' => $is_anon,
        ]);

        $this->comment = '';
    }
    public function render()
    {
        return view('livewire.comment.index',[
            'comments' => Comment::all(),
        ]);
    }
}
