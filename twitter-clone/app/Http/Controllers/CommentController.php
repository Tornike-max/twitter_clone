<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function store($id)
    {
        $data = request()->validated();

        $data['idea_id'] = $id;

        $data['user_id'] = auth()->id();

        Comment::create($data);

        return redirect()->route('dashboard')->with('success', 'Comment created successfully');
    }
}
