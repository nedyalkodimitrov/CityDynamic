<?php

namespace App\Observers;

use App\Http\Utils\Cart;
use App\Models\Ticket;

class TickerObserver
{
    public function created(Ticket $ticket)
    {
        if ($ticket->user_id == \Auth::user()->id) {
            Cart::getInstance(\Auth::user())->add($ticket);
        }
    }

    public function deleted(Ticket $ticket)
    {
        if ($ticket->user_id == \Auth::user()->id) {
            Cart::getInstance(\Auth::user())->remove($ticket);
        }
    }

    public function updating(Ticket $ticket)
    {
        if ($ticket->user_id == \Auth::user()->id) {
            Cart::getInstance(\Auth::user())->remove($ticket);
            Cart::getInstance(\Auth::user())->add($ticket);
        }
    }
}
