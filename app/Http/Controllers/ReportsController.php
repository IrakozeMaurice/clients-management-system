<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use PDF;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function showClientsReport()
    {
        $clients = Client::whereBetween('created_at', ['', ''])->get();
        return view('backend.reports.clients.index', compact('clients'));
    }

    public function showOrdersReport()
    {
        $orders = Order::whereBetween('created_at', ['', ''])->get();
        return view('backend.reports.orders.index', compact('orders'));
    }

    public function reportClients()
    {
        $attributes = request()->validate([
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
        ]);

        $from = $attributes['from'];
        $to = $attributes['to'];
        session()->put('from', $from);
        session()->put('to', $to);

        $clients = Client::whereBetween('created_at', [$from, $to])->get();

        return view('backend.reports.clients.index', compact('clients'));
    }

    public function reportOrders()
    {
        $attributes = request()->validate([
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
        ]);

        $from = $attributes['from'];
        $to = $attributes['to'];
        session()->put('from', $from);
        session()->put('to', $to);

        $orders = Order::whereBetween('created_at', [$from, $to])->get();

        return view('backend.reports.orders.index', compact('orders'));
    }

    public function clients_export_pdf()
    {
        $clients = Client::whereBetween('created_at', [session('from'), session('to')])->get();

        $pdf = PDF::loadView('backend.reports.clients.clientsList', compact('clients'));

        return $pdf->download('clientsReport.pdf');
    }

    public function orders_export_pdf()
    {
        $orders = Order::whereBetween('created_at', [session('from'), session('to')])->get();

        $pdf = PDF::loadView('backend.reports.orders.ordersList', compact('orders'));

        return $pdf->download('ordersReport.pdf');
    }
}
