<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;

class IdeaController extends Controller
{

    public function store(StoreIdeaRequest $request)
    {
        Idea::create($request->validated());
        return redirect()->route('dashboard')->with('success', 'Idea Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea Deleted Successfully');
    }
}
