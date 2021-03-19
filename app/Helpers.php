<?php

use App\Order;
use App\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function getAllClients()
{
    $clients = DB::table('clients')->get();
    return $clients;
}

function getAllOrders()
{
    $orders = DB::table('orders')->get();
    return $orders;
}

function getAllServices()
{
    $services = Service::all();
    return $services;
}

function getHostingPackages()
{
    $packages = DB::table('hosting')->get();
    return $packages;
}

function getDomainExtensions()
{
    $extensions = DB::table('domain')->get();
    return $extensions;
}

function getWebPackages()
{
    $packages = DB::table('web')->get();
    return $packages;
}

function getExpiringHosting()
{
    $expiringHostings = Order::where('service', 'Hosting')->orderBy('expiration_date', 'ASC')->get();
    return $expiringHostings;
}

function getExpiringDomains()
{
    $expiringDomains = Order::where('service', 'Domain')->orderBy('expiration_date', 'ASC')->get();
    return $expiringDomains;
}

function getOrdersTotal()
{
    $ordersTotal = Order::sum('price');
    return $ordersTotal;
}

function getMontlyOrdersTotal()
{
    $first = Carbon::today()->startOfMonth()->toDateString();
    $last = Carbon::today()->endOfMonth()->toDateString();

    $montlyOrdersTotal = Order::whereBetween('created_at', [$first, $last])->sum('price');

    return $montlyOrdersTotal;
}

function getExpenseCategories()
{
    $expenseCategories = DB::table('expense_categories')->get();
    return $expenseCategories;
}

function getAllProjects()
{
    $projects = DB::table('projects')->get();
    return $projects;
}
