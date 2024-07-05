<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;

class DashboardController extends Controller
{

    public $showComments = false;

    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'desc');

        if (request()->has('searchValue')) {
            $ideas->where('content', 'like', '%' . request()->get('searchValue', '') . '%');
        }



        $comments = [];


        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
            'comments' => $comments,
            'showComments' => $this->showComments
        ]);
    }
}
