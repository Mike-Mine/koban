<?php

use Livewire\Volt\Component;

new class extends Component {
    public $tickets;

    public function mount($tickets)
    {
        $this->tickets = $tickets;
    }
}; ?>

<div>
    <table class="w-full text-left bg-white shadow table-auto sm:p-4 sm:rounded-lg">
        <thead class="bg-gray-200 rounded-t-lg">
            <tr>
                <th class="px-4 py-3 font-bold rounded-tl-lg">
                    {{ __('Title') }}
                </th>
                <th class="px-4 py-3 font-bold">
                    {{ __('User') }}
                </th>
                <th class="px-4 py-3 font-bold">
                    {{ __('Last Updated') }}
                </th>
                <th class="px-4 py-3 font-bold rounded-tr-lg">
                    {{ __('Actions') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($tickets->isEmpty())
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td colspan="4" class="px-4 py-3 text-center">
                        {{ __('No tickets') }}
                    </td>
                </tr>
            @else
                @foreach ($tickets as $ticket)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-4 py-3">
                            <a href="#" class="hover:underline">
                                {{ $ticket->title }}
                            </a>
                        </td>
                        <td class="px-4 py-3">{{ $ticket->client->name }}</td>
                        <td class="px-4 py-3">
                            {{ $ticket->updated_at->diffForHumans() }}
                        </td>
                        <td class="px-4 py-3">
                            <x-wireui:mini-button
                                icon="check"
                                rounded
                                outline
                                rose
                                interaction:solid="rose"
                                size="xs"
                            />
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
