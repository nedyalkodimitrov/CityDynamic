<?php

namespace App\Http\Controllers;

use App\Events\SeatsStatusEvent;
use App\Models\Bus;
use Illuminate\Http\Request;;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function setSeatsStatus($busId, Request $request)
    {
        $seatStatus = $request->seatStatus;
        $bus = Bus::find($busId);
        $bus->seatsStatus = json_encode($seatStatus);
        $bus->save();

        SeatsStatusEvent::dispatch($busId, $seatStatus);
        event(new SeatsStatusEvent($busId, $seatStatus));
    }
}
