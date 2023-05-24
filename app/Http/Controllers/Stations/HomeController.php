<?php

namespace App\Http\Controllers\Stations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome() {
        return view('stations.pages.index');
    }
}
