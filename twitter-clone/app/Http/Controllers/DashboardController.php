<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard', [
            'ideas' => Idea::query()->orderBy('created_at', 'desc')->take(5)->get(),
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
}
