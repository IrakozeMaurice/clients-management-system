<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomainsController extends Controller
{
    public function index()
    {
        $domains = DB::table('domain')->get();
        return view('backend.services.domain.index', compact('domains'));
    }

    public function create()
    {
        return view('backend.services.domain.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validateDomain();
        DB::table('domain')->insert($attributes);
        return redirect('/domains');
    }

    public function show($id)
    {
        $extension = DB::table('domain')->where('id', $id)->first();
        return view('backend.services.domain.show', compact('extension'));
    }

    public function edit($id)
    {
        $extension = DB::table('domain')->where('id', $id)->first();
        return view('backend.services.domain.edit', compact('extension'));
    }

    public function update(Request $request, $id)
    {
        $attributes = $this->validateDomain();
        DB::table('domain')->where('id', $id)->update($attributes);
        return redirect('/domains');
    }

    public function destroy($id)
    {
        DB::table('domain')->where('id', $id)->delete();
        return redirect('/domains');
    }

    protected function validateDomain()
    {
        return request()->validate(
            [
                'extension' => ['required'],
                'price' => ['required', 'min:1'],
            ]
        );
    }
}
