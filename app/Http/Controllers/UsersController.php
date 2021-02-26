<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validateUser();
        $attributes['password'] = Hash::make($attributes['password']);
        $attributes['is_admin'] = request('is_admin');
        User::create($attributes);
        return redirect('/users');
    }

    public function show(User $user)
    {
        return view('backend.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = $this->validateUser();
        $attributes['password'] = Hash::make($attributes['password']);
        $attributes['is_admin'] = request('is_admin');
        $user->update($attributes);
        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }

    protected function validateUser()
    {
        return request()->validate(
            [
                'firstname' => ['required', 'min:3'],
                'lastname' => ['required', 'min:3'],
                'email' => ['required'],
                'password' => ['required', 'string', 'min:8']
            ]
        );
    }
}
