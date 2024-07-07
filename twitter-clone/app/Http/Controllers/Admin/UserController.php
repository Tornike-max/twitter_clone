<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        $users = User::latest()->paginate(5);
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        Gate::authorize('update', $user);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        Gate::authorize('update', $user);

        $data = $request->validated();

        if (count($data) === 0) {
            return;
        }

        if ($request->has('image')) {
            if (isset($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
            $imagePath = $request->file('image')->store('profile', 'public');
            $data['image'] = $imagePath;
        }

        $updatedUser = $user->update($data);

        return redirect()->route('admin.dashboard');
    }
}
