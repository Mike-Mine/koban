<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use App\Services\TicketService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Body extends Component
{
    public Ticket $ticket;

    #[Validate('required|string|max:255')]
    public string $message;

    public function createMessage(TicketService $ticketService): void
    {
        $this->validate();

        $message = $this->ticket->messages()->create([
            'content' => $this->message,
            'user_id' => auth()->user()->id,
        ]);

        $ticketService->updateStatusOnMessage($this->ticket, $message);
        $this->ticket->updated_at = $message->updated_at;

        $this->ticket->save();

        $this->reset('message');

        $this->dispatch('message-added');
    }

    public function render()
    {
        return view('livewire.tickets.body');
    }
}
