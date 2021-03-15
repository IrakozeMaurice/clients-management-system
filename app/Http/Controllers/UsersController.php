<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Profile;

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

    public function store()
    {
        $attributes = $this->validateUser();
        $attributes['password'] = Hash::make('');
        $attributes['is_finance'] = ($attributes['role'] == 'finance') ? true : false;
        $attributes['is_admin'] = ($attributes['role'] == 'admin') ? true : false;
        $attributes['approved'] = false;
        $user = new User();
        $user->firstname = $attributes['firstname'];
        $user->lastname = $attributes['lastname'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->is_finance = $attributes['is_finance'];
        $user->is_admin = $attributes['is_admin'];
        $user->approved = $attributes['approved'];

        $user->save();
        Profile::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'phone' => '',
            'address' => ''
        ]);
        return redirect('/users')->with('message', 'user created');
    }

    public function show(User $user)
    {
        return view('backend.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_unless($user->id == auth()->id() || auth()->user()->is_admin == 1, 403, 'You are not authorized to view this page');
        return view('backend.users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = $this->validateUser();
        $user->firstname = $attributes['firstname'];
        $user->lastname = $attributes['lastname'];
        $user->email = $attributes['email'];
        $user->is_finance = request('role') === 'finance' ? true : false;
        $user->is_admin = request('role') === 'admin' ? true : false;
        $user->save();
        return redirect('/users')->with('message', 'profile updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }

    public function showRegisterForm()
    {
        return view('backend.users.approve');
    }

    public function register()
    {

        $user = User::where('email', request('email'))->get()->first();

        if ($user) {
            #update user password
            $attributes = request()->validate([
                'password' => ['required', 'min:8']
            ]);
            $user->password = Hash::make($attributes['password']);
            $user->save();
            return view('backend.users.waitingApproval');
        }
        return redirect()->back()->with('error', 'These credentials do not match our records');
    }

    public function approve($id)
    {
        $user = User::where('id', $id)->get()->first();
        $user->approved = 1;
        $user->save();
        return redirect('/users')->with('message', 'user approved');
    }

    protected function validateUser()
    {
        return request()->validate(
            [
                'firstname' => ['required', 'min:3'],
                'lastname' => ['required', 'min:3'],
                'email' => ['required'],
                'role' => ['required'],
            ]
        );
    }
}
