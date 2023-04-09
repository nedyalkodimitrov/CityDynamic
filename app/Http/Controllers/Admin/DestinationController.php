<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function showDestinations()
    {
        return view('admin.pages.destination.destinations');
    }

    public function showDestination()
    {
        return view('admin.pages.destination.destination');
    }

    public function showDestinationCreate()
    {
        return view('admin.pages.destination.destinationCreate');
    }

    public function showDestinationEdit()
    {
        return view('admin.pages.destination.destinationEdit');
    }
}
