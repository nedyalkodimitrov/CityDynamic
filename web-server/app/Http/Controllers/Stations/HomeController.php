<?php

namespace App\Http\Controllers\Stations;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('stations.pages.index');
    }
}
