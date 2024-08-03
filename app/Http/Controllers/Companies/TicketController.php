<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function showTickets()
    {
        return view('admin.pages.ticket.tickets');
    }

    public function showTicket()
    {
        return view('admin.pages.ticket.ticket');
    }

    public function showTicketCreate()
    {
        return view('admin.pages.ticket.ticketCreate');
    }

    public function showTicketEdit()
    {
        return view('admin.pages.ticket.ticketEdit');
    }

    public function createTicket(Request $request)
    {
        $ticket = new \App\Models\Ticket;
        $ticket->course = $request->course;
        $ticket->price = $request->price;
        $ticket->save();
    }

    public function editTicket($ticketId, Request $request)
    {
        $ticket = \App\Models\Ticket::find($ticketId);
        $ticket->course = $request->course;
        $ticket->price = $request->price;
        $ticket->save();
    }
}
