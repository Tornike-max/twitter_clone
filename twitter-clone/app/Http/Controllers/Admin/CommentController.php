<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(5);

        return view('admin.comments.index', [
            'comments' => $comments
        ]);
    }

    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', [
            'comment' => $comment
        ]);
    }

    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();

        if (count($data) === 0) {
            return;
        }

        $comment->update($data);

        return view('admin.comments.edit', [
            'comment' => $comment
        ]);
    }

    public function destroy(Comment $comment)
    {
        if (!$comment) return;
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comment Deleted Successfully');
    }
}
