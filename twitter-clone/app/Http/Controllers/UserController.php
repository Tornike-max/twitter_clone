<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'name' => ['required', 'max:70', 'min:2', 'string']
        ]);

        if (count($data) === 0) {
            return;
        }

        $updatedUser = $user->update($data);

        return redirect()->route('users.show', [
            'user' => $updatedUser,
            'showComments' => $this->showComments
        ]);
    }
}
