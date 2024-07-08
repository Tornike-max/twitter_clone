<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::all();
        $totalIdeas = Idea::all();
        $totalComments = Comment::all();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalIdeas' => $totalIdeas,
            'totalComments' => $totalComments
        ]);
    }
}
