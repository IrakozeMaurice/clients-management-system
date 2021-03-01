<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        $webs = DB::table('web')->get();
        return view('backend.services.web.index', compact('webs'));
    }

    public function create()
    {
        return view('backend.services.web.create');
    }

    public function store()
    {
        $attributes = $this->validateWeb();
        DB::table('web')->insert($attributes);
        return redirect('/web');
    }

    public function show($id)
    {
        $package = DB::table('web')->where('id', $id)->first();
        return view('backend.services.web.show', compact('package'));
    }

    public function edit($id)
    {
        $package = DB::table('web')->where('id', $id)->first();
        return view('backend.services.web.edit', compact('package'));
    }

    public function update($id)
    {
        $attributes = $this->validateWeb();
        DB::table('web')->where('id', $id)->update($attributes);
        return redirect('/web');
    }

    public function destroy($id)
    {
        DB::table('web')->where('id', $id)->delete();
        return redirect('/web');
    }

    protected function validateWeb()
    {
        return request()->validate(
            [
                'package_name' => ['required'],
                'price' => ['required', 'min:1'],
            ]
        );
    }
}
