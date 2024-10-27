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

        <x-wireui:button
            type="submit"
            class="mt-4"
        >
            {{ __('Reply') }}
        </x-wireui:button>
    </form>
</div>
