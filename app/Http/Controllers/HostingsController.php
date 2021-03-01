<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HostingsController extends Controller
{
    public function index()
    {
        $hostings = DB::table('hosting')->get();
        return view('backend.services.hosting.index', compact('hostings'));
    }

    public function create()
    {
        return view('backend.services.hosting.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validateHosting();
        DB::table('hosting')->insert($attributes);
        return redirect('/hostings');
    }

    public function show($id)
    {
        $package = DB::table('hosting')->where('id', $id)->first();
        return view('backend.services.hosting.show', compact('package'));
    }

    public function edit($id)
    {
        $package = DB::table('hosting')->where('id', $id)->first();
        return view('backend.services.hosting.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $attributes = $this->validateHosting();
        DB::table('hosting')->where('id', $id)->update($attributes);
        return redirect('/hostings');
    }

    public function destroy($id)
    {
        DB::table('hosting')->where('id', $id)->delete();
        return redirect('/hostings');
    }

    protected function validateHosting()
    {
        return request()->validate(
            [
                'package_name' => ['required', 'min:3'],
                'disc_space' => ['required'],
                'bandwidth' => ['required'],
                'email_accounts' => ['required', 'min:1'],
                'parked_domains' => ['required', 'min:1'],
                'subdomain' => ['required', 'min:1'],
                'ftp_accounts' => ['required', 'min:1'],
                'price' => ['required', 'min:1'],
            ]
        );
    }
}
