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
    // $expiringHostings->expiration_date = Carbon::parse($expiringHostings->expiration_date);
    return $expiringHostings;
}

function getExpiringDomains()
{
    $expiringDomains = Order::where('service', 'Domain')->orderBy('expiration_date', 'ASC')->get();
    // $expiringDomains->expiration_date = Carbon::parse($expiringDomains->expiration_date);
    return $expiringDomains;
}
