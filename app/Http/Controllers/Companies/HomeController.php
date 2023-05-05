<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\BusStation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome()
    {

        return view('companies.pages.index');
    }


}
