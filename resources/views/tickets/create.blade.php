<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create a New Ticket') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-wireui:button label="Back" :href="route('tickets.index')" wire:navigate white icon="arrow-left" />

                    <livewire:forms.create-ticket />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
