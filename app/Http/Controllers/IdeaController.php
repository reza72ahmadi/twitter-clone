<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;

class IdeaController extends Controller
{

    public function store(StoreIdeaRequest $request)
    {
        $inputs = $request->validated();
        Idea::create($inputs);
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
        $editing = true;
        return view('show', compact('editing', 'idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        $idea->update($request->validated());
        return redirect()->route('dashboard')->with('success', 'Idea Updated Successfully');
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
