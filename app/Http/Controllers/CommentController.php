<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $validated = request()->validate([
            'content' => 'required'
        ]);
        $validated['idea_id'] = $idea->id;
        $validated['user_id'] = auth()->id();
        Comment::create($validated);

        return redirect()->route('ideas.show', $idea->id);
    }
}
