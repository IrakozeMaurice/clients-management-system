<?php

use App\Service;
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
