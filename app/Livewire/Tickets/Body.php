<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Body extends Component
{
    public Ticket $ticket;

    #[Validate('required|string|max:255')]
    public string $message;

    public function createMessage(): void
    {
        $this->validate();

        $this->ticket->messages()->create([
            'content' => $this->message,
            'user_id' => auth()->user()->id,
        ]);

        $this->reset('message');

        $this->dispatch('message-added');
    }

    public function render()
    {
        return view('livewire.tickets.body');
    }
}
