<?php

namespace App\Http\Controllers;

use App\Client;
use App\Expense;
use App\Order;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function showExpensesReport()
    {
        $expenses = Expense::whereBetween('created_at', ['', ''])->get();
        return view('backend.reports.expenses.index', compact('expenses'));
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

    public function reportExpenses()
    {
        $attributes = request()->validate([
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
        ]);

        $from = $attributes['from'];
        $to = $attributes['to'];
        session()->put('from', $from);
        session()->put('to', $to);

        $expenses = Expense::whereBetween('created_at', [$from, $to])->get();

        return view('backend.reports.expenses.index', compact('expenses'));
    }

    public function clients_export_pdf()
    {
        $clients = Client::whereBetween('created_at', [session('from'), session('to')])->get();

        $pdf = PDF::loadView('backend.reports.clients.clientsList', compact('clients'))->setPaper('A4', 'landscape');

        return $pdf->download('clientsReport.pdf');
    }

    public function orders_export_pdf()
    {
        $orders = Order::whereBetween('created_at', [session('from'), session('to')])->get();

        $pdf = PDF::loadView('backend.reports.orders.ordersList', compact('orders'))->setPaper('A4', 'landscape');

        return $pdf->download('ordersReport.pdf');
    }

    public function expenses_export_pdf()
    {
        $expenses = Expense::whereBetween('created_at', [session('from'), session('to')])->get();

        $pdf = PDF::loadView('backend.reports.expenses.expensesList', compact('expenses'))->setPaper('A4', 'landscape');

        return $pdf->download('expensesReport.pdf');
    }
}
