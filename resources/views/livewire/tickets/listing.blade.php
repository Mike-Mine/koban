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
                <th class="px-4 py-3 font-bold">
                    {{ __('Assignee') }}
                </th>
                <th class="px-4 py-3 font-bold rounded-tr-lg">
                    {{ __('Status') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @if (false)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td colspan="4" class="px-4 py-3 text-center">
                        {{ __('No tickets') }}
                    </td>
                </tr>
            @else
                @foreach ($tickets as $ticket)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-4 py-3">
                            <x-wireui:link
                                :href="route('tickets.show', $ticket)"
                                secondary
                                wire:navigate
                            >
                                {{ $ticket->title }}
                            </x-wireui:link>
                        </td>
                        <td class="px-4 py-3">{{ $ticket->client->name }}</td>
                        <td class="px-4 py-3">
                            {{ $ticket->updated_at->diffForHumans() }}
                        </td>
                        <td class="px-4 py-3">{{ $ticket->specialist?->name ?? __('Unassigned') }}</td>
                        <td class="px-4 py-3 {{ $ticket->status->color() }}">
                            {{ $ticket->status->formatted() }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $tickets->links() }}
</div>
