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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('backend.orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('backend.orders.create', compact('clients'));
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
                'domain_name' => $attributes['domain_name_hosting'],
                'ns_one' => $attributes['ns_one_hosting'],
                'ns_two' => $attributes['ns_two_hosting'],
                'ns_three' => $attributes['ns_three_hosting'],
                'ns_four' => $attributes['ns_four_hosting'],
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
                'domain_name' => $attributes['domain_name_domain'],
                'ns_one' => $attributes['ns_one_domain'],
                'ns_two' => $attributes['ns_two_domain'],
                'ns_three' => $attributes['ns_three_domain'],
                'ns_four' => $attributes['ns_four_domain'],
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
                'ns_one' => null,
                'ns_two' => null,
                'ns_three' => null,
                'ns_four' => null,
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
                'domain_name' => $attributes['domain_name_hosting'],
                'ns_one' => $attributes['ns_one_hosting'],
                'ns_two' => $attributes['ns_two_hosting'],
                'ns_three' => $attributes['ns_three_hosting'],
                'ns_four' => $attributes['ns_four_hosting'],
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
                'domain_name' => $attributes['domain_name_domain'],
                'ns_one' => $attributes['ns_one_domain'],
                'ns_two' => $attributes['ns_two_domain'],
                'ns_three' => $attributes['ns_three_domain'],
                'ns_four' => $attributes['ns_four_domain'],
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
                'ns_one' => null,
                'ns_two' => null,
                'ns_three' => null,
                'ns_four' => null,
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
