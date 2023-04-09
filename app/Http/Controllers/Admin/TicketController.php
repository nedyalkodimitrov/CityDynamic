<?php

namespace App\Http\Controllers\Admin;

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
}
