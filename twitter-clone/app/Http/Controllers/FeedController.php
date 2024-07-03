<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $followingIds = auth()->user()->followings()->pluck('user_id');

        $ideas = Idea::whereIn('user_id', $followingIds)->latest();

        $showComments = [];
        if (request()->has('searchValue')) {
            $ideas->where('content', 'like', '%' . request()->get('searchValue', '') . '%');
        }


        $comments = [];


        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
            'comments' => $comments,
            'showComments' => $showComments
        ]);
    }
}
