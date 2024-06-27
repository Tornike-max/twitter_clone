<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function store($id)
    {

        $data = request()->validate([
            'content' => ['required', 'max:150'],
        ]);

        $data['idea_id'] = $id;

        Comment::create($data);

        return redirect()->route('dashboard')->with('success', 'Comment created successfully');
    }

    public function show($id)
    {
        dd($id);
    }
}
