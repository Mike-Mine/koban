<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Listing extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $page = 1;

    public function render()
    {
        return view('livewire.tickets.listing', [
            'tickets' => Ticket::filter()->with('client:id,name', 'specialist:id,name')->orderBy('updated_at', 'desc')->paginate(15)
        ]);
    }
}
