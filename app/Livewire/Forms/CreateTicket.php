<?php

namespace App\Livewire\Forms;

use App\Models\Ticket;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTicket extends Component
{
    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|string|max:255')]
    public string $message = '';

    public function submit()
    {
        $this->validate();

        $ticket = Ticket::create([
            'title' => $this->title,
            'client_id' => auth()->user()->id,
        ]);

        $ticket->messages()->create([
            'content' => $this->message,
            'user_id' => auth()->user()->id,
        ]);

        return $this->redirect('/tickets');
    }

    public function render()
    {
        return view('livewire.forms.create-ticket');
    }
}
