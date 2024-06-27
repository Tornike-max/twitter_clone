<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        $comments = $idea->comment;
        $showComments = true;
        return view('ideas.show', [
            'idea' => $idea,
            'comments' => $comments,
            'showComments' => $showComments
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => ['required', 'max:255', 'min:2'],
        ]);

        Idea::create($data);
        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

    public function destroy($id)
    {

        $idea = Idea::query()->where('id', $id)->firstOrFail();

        if (isset($idea)) {
            $idea->delete();
            return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
        }

        return redirect()->route('dashboard')->with('error', 'Deletion failed');
    }

    public function edit(Idea $idea)
    {

        return view('ideas.edit', [
            'idea' => $idea,
        ]);
    }

    public function update(Idea $idea, Request $request)
    {
        $data = $request->validate([
            'content' => ['required', 'max:255', 'min:2'],
        ]);

        $idea->update($data);

        return redirect()->route('dashboard')->with('success', 'Idea updated successfully');
    }
}
