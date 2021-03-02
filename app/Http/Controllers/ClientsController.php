<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::all();
        return view('backend.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('backend.clients.create');
    }

    public function store(Request $request)
    {

        $attributes = $this->validateClient();
        Client::create($attributes);
        return redirect('/clients');
    }

    public function show(Client $client)
    {
        return view('backend.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('backend.clients.edit', compact('client'));
    }

    public function update(Client $client, Request $request)
    {
        $attributes = $this->validateClient();
        $client->update($attributes);

        return redirect('/clients');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/clients');
    }

    protected function validateClient()
    {
        return request()->validate(
            [
                'firstname' => ['required', 'min:3'],
                'lastname' => ['required', 'min:3'],
                'email' => ['required'],
                'phone' => ['required'],
                'address' => ['required'],
                'district' => ['required'],
                'city' => ['required'],
                'country' => ['required']
            ]
        );
    }
}
