<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard', [
            'ideas' => Idea::query()
                ->orderBy('created_at', 'desc')
                ->paginate(5),
        ]);
    }

    public function show(Idea $idea)
    {
        return view('show', [
            'idea' => $idea
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

    public function destroy($id)
    {

        $idea = Idea::query()->where('id', $id)->firstOrFail();

        if (isset($idea)) {
            $idea->delete();
            return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
        }

        return redirect()->route('dashboard')->with('error', 'Deletion failed');
    }
}
