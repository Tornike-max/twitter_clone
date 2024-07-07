<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;


class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::latest()->paginate(5);

        return view('admin.ideas.index', [
            'ideas' => $ideas
        ]);
    }

    public function show(Idea $idea)
    {
        return view('admin.ideas.show', [
            'idea' => $idea
        ]);
    }

    public function edit(Idea $idea)
    {

        return view('admin.ideas.edit', compact('idea'));
    }

    public function update(UpdateIdeaRequest $request, Idea $idea)
    {

        $data = $request->validated();

        if (count($data) === 0) {
            return;
        }

        $idea->update($data);

        return redirect()->route('admin.dashboard');
    }

    public function destroy(Idea $idea)
    {
        if (!$idea) {
            return;
        }
        $idea->delete();
        return redirect()->route('admin.dashboard')->with('message', 'Idea Deleted Successfully!');
    }
}
