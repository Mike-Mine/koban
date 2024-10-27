<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    @if (auth()->user()->isClient())
        <x-slot name="right">
            <x-wireui:link label="Create a New Ticket" :href="route('tickets.create')" wire:navigate secondary />
        </x-slot>
    @endif

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <livewire:tickets.list :tickets="$tickets">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
