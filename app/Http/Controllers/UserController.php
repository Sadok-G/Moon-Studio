<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;

class UserController
{
    /**
     * Display a listing of the user.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', [
            'user' => $users,
        ]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified user.
     */
    public function show(string $id)
    {
        return view('user.profil', [
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        return view('user.edit', [
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate(
            [
                'name' => 'required|string|min:3',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'phone_number' => ['required', (new Phone)->country('BJ'), Rule::unique('users')->ignore($user->id)],
            ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        $user->save();

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('dashboard');
    }
}
