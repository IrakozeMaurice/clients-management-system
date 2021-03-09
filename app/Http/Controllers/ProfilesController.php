<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function show($id)
    {
        $profile = Profile::where('user_id', $id)->get()->first();
        return view('profiles.show', compact('profile'));
    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('profiles.edit', compact('profile'));
    }

    public function update($id)
    {
        $profile = Profile::find($id);
        $attributes = $this->validateProfile();
        $profile->phone = $attributes['phone'];
        $profile->address = $attributes['address'];
        $profile->save();

        return redirect()->back()->with('message', 'profile updated');
    }

    protected function validateProfile()
    {
        return request()->validate(
            [
                'phone' => ['required', 'min:3'],
                'address' => 'required',
            ]
        );
    }
}
