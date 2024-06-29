<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

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

        if (auth()) {
            $data = $request->validate([
                'content' => ['required', 'max:255', 'min:2'],
            ]);

            $data['user_id'] = auth()->id();

            Idea::create($data);
            return redirect()->route('dashboard')->with('success', 'Idea created successfully');
        }
        return redirect()->route('dashboard')->with('error', "Can't creata idea");
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
        if (auth()->id() === $idea->user->id) {
            $data = $request->validate([
                'content' => ['required', 'max:255', 'min:2'],
            ]);

            $idea->update($data);

            return redirect()->route('dashboard')->with('success', 'Idea updated successfully');
        }
        return abort(404);
    }
}
