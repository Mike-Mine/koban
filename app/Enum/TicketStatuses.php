<?php

namespace App\Enum;

use Illuminate\Support\Str;

enum TicketStatuses: string
{
    case OPEN = 'open';
    case PENDING = 'pending';
    case CLOSED = 'closed';

    /**
     * Returns the ticket status with the first letter capitalized.
     *
     * @return string The formatted ticket status.
     */
    public function formatted(): string
    {
        return Str::ucfirst($this->value);
    }

    /**
     * Returns the tailwind color class for the ticket status.
     *
     * @return string The tailwind color class.
     */
    public function color(): string
    {
        return match($this) {
            self::OPEN => 'text-green-500',
            self::PENDING => 'text-orange-500',
            self::CLOSED => 'text-gray-500',
        };
    }
}
