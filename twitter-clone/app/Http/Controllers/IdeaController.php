<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        $comments = $idea->comment;
        $user = $idea->user;
        $showComments = true;

        return view('ideas.show', [
            'idea' => $idea,
            'user' => $user,
            'comments' => $comments,
            'showComments' => $showComments
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'content' => ['required', 'max:255', 'min:2'],
        ]);

        $data['user_id'] = auth()->id();

        Idea::create($data);
        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

    public function destroy(Request $request, Idea $idea)
    {

        // if (!Gate::allows('ideas.destroy', $idea)) {
        //     abort(403);
        // };

        //policie
        Gate::authorize('delete', $idea);

        $ideas = Idea::query()->where('id', $idea->id)->firstOrFail();

        if (isset($ideas)) {
            $ideas->delete();
            return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
        }

        return redirect()->route('dashboard')->with('error', 'Deletion failed');
    }

    public function edit(Request $request, Idea $idea)
    {
        // if (!Gate::allows('ideas.edit', $idea)) {
        //     abort(403);
        // }

        //policie
        Gate::authorize('update', $idea);

        return view('ideas.edit', [
            'idea' => $idea,
        ]);
    }

    public function update(Idea $idea, Request $request)
    {
        // if (!Gate::allows('ideas.edit', $idea)) {
        //     abort(403);
        // }

        //policie
        Gate::authorize('update', $idea);

        $data = $request->validate([
            'content' => ['required', 'max:255', 'min:2'],
        ]);

        $idea->update($data);

        return redirect()->route('dashboard')->with('success', 'Idea updated successfully');
    }
}
