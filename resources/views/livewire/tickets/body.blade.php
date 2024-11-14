<div>
    <div class="flex items-center justify-between py-3 mb-4 border-b border-gray-300">
        <div class="flex items-center">
            <x-wireui:button label="Back" :href="route('tickets.index')" wire:navigate white icon="arrow-left" />
            @if (!auth()->user()->isClient() && auth()->user()->id !== $ticket->client_id)
                <span class="font-semibold text-gray-600 ms-2">{{ $ticket->client->name }} ({{ $ticket->client->email }})</span>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-action-message class="me-3" on="specialist-updated">
                {{ __('Saved.') }}
            </x-action-message>
            <div class="w-48">
                <x-wireui:select
                    placeholder="Assignee"
                    wire:model.live="selectedSpecialistId"
                    :async-data="[
                        'api' => route('api.users.index'),
                        'params' => ['role' => 'specialist'],
                        'credentials' => 'include',
                    ]"
                    option-label="name"
                    option-value="id"
                />
            </div>
            <div class="{{ $ticket->status->color() }}">
                {{ $ticket->status->formatted() }}
            </div>
        </div>
    </div>
    <div
        class="flex flex-col h-screen overflow-hidden"
        style="height: calc(100vh - 21rem)"
    >
        <div x-data
            x-init="$el.scrollTop = $el.scrollHeight"
            @message-added.window="$nextTick(() => $el.scrollTop = $el.scrollHeight)"
            class="flex-1 overflow-y-auto scrolling-touch"
            id="messagesContainer"
        >
            @foreach ($ticket->messages as $message)
                <div
                    class="
                        p-4 max-w-2xl
                        @if ($message->user_id === auth()->id())
                            bg-blue-500 ms-auto text-white mr-2
                            rounded-bl-lg
                        @else
                            bg-gray-100 me-auto ml-2
                            rounded-br-lg
                        @endif
                        rounded-t-lg w-fit
                        mb-4
                        flex flex-col
                    "
                >
                    <p class="text-left">{{ $message->content }}</p>
                    <small class="text-right">{{ $message->created_at->format('d/m/Y H:i') }}</small>
                </div>
            @endforeach
        </div>

        <form wire:submit.prevent="createMessage" class="p-4">
            <x-wireui:textarea
                label="New message"
                wire:model="message"
                placeholder="{{ __('Reply') }}"
            />

            <x-wireui:button type="submit" class="mt-4">
                {{ __('Reply') }}
            </x-wireui:button>
        </form>
    </div>
</div>
