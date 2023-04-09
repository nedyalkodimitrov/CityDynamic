<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function showBuses()
    {
        return view('admin.pages.bus.buses');
    }

    public function showBus()
    {
        return view('admin.pages.bus.bus');
    }

    public function showBusCreate()
    {
        return view('admin.pages.bus.busCreate');
    }

    public function showBusEdit()
    {
        return view('admin.pages.bus.busEdit');
    }
}
