<div>
    <form wire:submit="submit" class="mt-6 space-y-6">
        <div>
            <x-wireui:input
                wire:model="title"
                label="Title"
                placeholder="Ticket title"
                description="Make up a title for your ticket"
            />
        </div>

        <div>
            <x-wireui:textarea wire:model="message" label="Message" />
        </div>

        <div class="flex items-center gap-4">
            <x-wireui:button rose wire:click="submit">{{ __('Submit') }}</x-wireui:button>
        </div>
    </form>
</div>
