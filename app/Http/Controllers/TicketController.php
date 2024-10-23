<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Contracts\View\View;

class TicketController extends Controller
{
    public function index(): View
    {
        $tickets = Ticket::filter()->with('client:id,name', 'specialist:id,name')->orderBy('updated_at', 'desc')->get();

        return view('tickets.index', compact('tickets'));
    }
}
