<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\IgnoreFunctionForCodeCoverage;

class IdeaController extends Controller
{
    //show
    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    //store
    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:4'
        ]);
        $validated['user_id'] = auth()->id();
        Idea::create($validated);
        return redirect()->route('dashboard')->with('success', 'Idea created successfuly');
    }

    //destroy
    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfuly');
    }
    // edit
    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    // update
    public function update(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $validated =  request()->validate([
            'content' => 'required|min:4'
        ]);
        $idea->update($validated);
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfuly');
    }
}
