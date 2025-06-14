<?php

namespace App\Http\Controllers;

use App\Events\SeatsStatusEvent;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function setSeatsStatus($busId, Request $request)
    {
        $seatStatus = $request->seatStatus;
        //        var_dump($seatStatus);
        $bus = Bus::find($busId);
        $bus->seatsStatus = json_encode($seatStatus);
        $bus->save();

        event(new SeatsStatusEvent($busId, $seatStatus));
    }
}
