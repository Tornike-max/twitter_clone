<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public $showComments = true;
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $comments = [];
        return view('users.show', [
            'user' => $user,
            'comments' => $comments,
            'showComments' => $this->showComments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return view('users.edit', [
            'user' => $user,
            'showComments' => $this->showComments
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['max:70', 'min:2', 'string'],
            'bio' => 'nullable|string|min:2|max:255',
            'image' => 'image'
        ]);

        if (count($data) === 0) {
            return;
        }

        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $data['image'] = $imagePath;

            Storage::disk('public')->delete($user->image);
        }

        $updatedUser = $user->update($data);

        return redirect()->route('profile', [
            'user' => $updatedUser,
            'showComments' => $this->showComments
        ]);
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
