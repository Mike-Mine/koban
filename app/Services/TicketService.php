<?php

namespace App\Services;

use App\Enum\TicketStatuses;
use App\Models\Ticket;
use App\Models\Message;

class TicketService
{
    /**
     * Updates the ticket status to open if the last message was sent by the client,
     * or to pending if it was sent by a specialist.
     *
     * @param Ticket $ticket The ticket to update.
     * @param Message $message The last message.
     */
    public function updateTicketOnMessage(Ticket $ticket, Message $message): void
    {
        if ($message->user->isClient()) {
            $ticket->status = TicketStatuses::OPEN;
        } else {
            $ticket->status = TicketStatuses::PENDING;

            if (empty($ticket->specialist_id)) {
                $ticket->specialist_id = $message->user_id;
            }
        }

        $ticket->save();
    }
}
