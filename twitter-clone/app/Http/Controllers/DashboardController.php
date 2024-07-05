<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;

class DashboardController extends Controller
{

    public $showComments = false;

    public function index()
    {
        //1 პირველი ვერსია;
        // $ideas = Idea::orderBy('created_at', 'desc');

        // if (request()->has('searchValue')) {
        //     $searchValue = request()->get('searchValue', '');
        //     $ideas->search($searchValue);
        // }

        //2 მეორე ვერსია;
        $ideas = Idea::when(request()->has('searchValue'), function ($query) {
            $searchValue = request()->get('searchValue', '');
            $query->search($searchValue);
        })->orderBy('created_at', 'desc');

        $comments = [];

        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
            'comments' => $comments,
            'showComments' => $this->showComments
        ]);
    }
}
