<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $ticket->title }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center py-3 mb-4 border-b border-gray-300">
                        <x-wireui:button label="Back" :href="route('tickets.index')" wire:navigate white icon="arrow-left" />
                        @if (!auth()->user()->isClient() && auth()->user()->id !== $ticket->client_id)
                            <span class="font-semibold text-gray-600 ms-2">{{ $ticket->client->name }} ({{ $ticket->client->email }})</span>
                        @endif
                    </div>

                    <livewire:tickets.body :ticket="$ticket" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>