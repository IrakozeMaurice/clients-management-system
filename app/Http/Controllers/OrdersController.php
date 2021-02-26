<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Client;
use App\Service;
use Carbon\Carbon;

class OrdersController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('backend.orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        $services = Service::all();
        return view('backend.orders.create', compact('clients', 'services'));
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $attributes['service_id'] = Service::where('name', request('service'))->value('id');

        //calculate price
        if ($attributes['service'] == 'Hosting') {
            $attributes['price'] = DB::table('hosting')->where('package_name', $attributes['package_hosting'])->value('price');

            Order::create([
                'client_id' => $attributes['client_id'],
                'service_id' => $attributes['service_id'],
                'service' => $attributes['service'],
                'package' => $attributes['package_hosting'],
                'extension' => null,
                'domain_name' => null,
                'name_server' => $attributes['name_server_hosting'],
                'price' => $attributes['price'],
                'registration_date' => date('y-m-d'),
                'expiration_date' => Carbon::now()->addYear(1)
            ]);
        }
        if ($attributes['service'] == 'Domain') {
            $attributes['price'] = DB::table('domain')->where('extension', request('extension'))->value('price');
            Order::create([
                'client_id' => $attributes['client_id'],
                'service_id' => $attributes['service_id'],
                'service' => $attributes['service'],
                'package' => null,
                'extension' => $attributes['extension'],
                'domain_name' => $attributes['domain_name'],
                'name_server' => $attributes['name_server_domain'],
                'price' => $attributes['price'],
                'registration_date' => date('y-m-d'),
                'expiration_date' => Carbon::now()->addYear(1)
            ]);
        }
        if ($attributes['service'] == 'Web') {
            $attributes['price'] = DB::table('web')->where('package_name', request('package_web'))->value('price');
            Order::create([
                'client_id' => $attributes['client_id'],
                'service_id' => $attributes['service_id'],
                'service' => $attributes['service'],
                'package' => $attributes['package_web'],
                'extension' => null,
                'domain_name' => null,
                'name_server' => null,
                'price' => $attributes['price'],
                'registration_date' => date('y-m-d'),
                'expiration_date' => null
            ]);
        }

        return redirect('/orders');
    }

    public function show(Order $order)
    {
        return view('backend.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('backend.orders.edit', compact('order'));
    }

    public function update(Order $order, Request $request)
    {
        $attributes = $request->all();
        $attributes['service_id'] = Service::where('name', request('service'))->value('id');
        if ($attributes['service'] == 'Hosting') {
            $attributes['price'] = DB::table('hosting')->where('package_name', $attributes['package_hosting'])->value('price');

            $order->update([
                'client_id' => $attributes['client_id'],
                'service_id' => $attributes['service_id'],
                'service' => $attributes['service'],
                'package' => $attributes['package_hosting'],
                'extension' => null,
                'domain_name' => null,
                'name_server' => $attributes['name_server_hosting'],
                'price' => $attributes['price'],
                'registration_date' => date('y-m-d'),
                'expiration_date' => Carbon::now()->addYear(1)
            ]);
        }
        if ($attributes['service'] == 'Domain') {
            $attributes['price'] = DB::table('domain')->where('extension', request('extension'))->value('price');
            $order->update([
                'client_id' => $attributes['client_id'],
                'service_id' => $attributes['service_id'],
                'service' => $attributes['service'],
                'package' => null,
                'extension' => $attributes['extension'],
                'domain_name' => $attributes['domain_name'],
                'name_server' => $attributes['name_server_domain'],
                'price' => $attributes['price'],
                'registration_date' => date('y-m-d'),
                'expiration_date' => Carbon::now()->addYear(1)
            ]);
        }
        if ($attributes['service'] == 'Web') {
            $attributes['price'] = DB::table('web')->where('package_name', request('package_web'))->value('price');
            $order->update([
                'client_id' => $attributes['client_id'],
                'service_id' => $attributes['service_id'],
                'service' => $attributes['service'],
                'package' => $attributes['package_web'],
                'extension' => null,
                'domain_name' => null,
                'name_server' => null,
                'price' => $attributes['price'],
                'registration_date' => date('y-m-d')
            ]);
        }
        return redirect('/orders');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/orders');
    }
}
