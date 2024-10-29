<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class TicketController extends Controller
{
    public function show(Ticket $ticket): View
    {
        Gate::authorize('view', $ticket);

        return view('tickets.show', compact('ticket'));
    }
}
