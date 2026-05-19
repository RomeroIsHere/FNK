<x-dialog-modal wire:model="ViewingItemModal">
    <x-slot name="title">
        Sought item: {{$ViewedItem->name}}
    </x-slot>
    <x-slot name="content">
        {{$ViewedItem->description}}

        <div class="flex flex-col">
            @foreach ($ViewedItem->founditems as $soughts)
                <div class="bg-blue-200 hover:bg-sky-700 focus:bg-sky-700 active:bg-sky-900 m-2 p-3 lg:p-4 rounded-lg" wire:click="openModal({{ $soughts->id }})">
                    {{ $soughts->name }}
                    @if (Auth::id()==$ViewedItem->user->id)
                    <x-button class="ml-2" wire:click="" wire:loading.attr="disabled">
                        Mark as Found!
                    </x-button>
                    @endif
                </div>
            @endforeach
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$toggle('ViewingItemModal')" wire:loading.attr="disabled">
            Close
        </x-secondary-button>
        @if ($ViewedItem->user && Auth::id()==$ViewedItem->user->id)
            <x-danger-button class="ml-2" wire:click="deleteSought({{ $ViewedItem->id }})" wire:loading.attr="disabled">
                Delete Item
            </x-danger-button>
            <x-button class="ml-2" wire:click="editSought({{ $ViewedItem->id }})" wire:loading.attr="disabled">
                Edit Item
            </x-button>
        @endif
    </x-slot>
</x-dialog-modal>
