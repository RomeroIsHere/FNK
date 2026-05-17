
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Sought Items:{{ $count }}
    </h1>
    <x-input placeholder="Buscar..." wire:model.live="where"/>
    <div class="flex flex-col">
        @foreach ($this->sought() as $soughts)
            <div class="bg-blue-200 hover:bg-sky-700 focus:bg-sky-700 active:bg-sky-900 m-2 p-3 lg:p-4 rounded-lg" wire:click="openSoughtModal({{ $soughts->id }})">
                {{ $soughts->name }}
            </div>
        @endforeach
    </div>
     <x-dialog-modal wire:model="ViewingItemModal">
        <x-slot name="title">
            Found item: {{$ViewedItem->name}}
        </x-slot>
        <x-slot name="content">
            {{$ViewedItem->description}}

            <div class="flex flex-col">
                @foreach ($ViewedItem->soughtitems as $soughts)
                    <div class="bg-blue-200 hover:bg-sky-700 focus:bg-sky-700 active:bg-sky-900 m-2 p-3 lg:p-4 rounded-lg" wire:click="openSoughtModal({{ $soughts->id }})">
                        {{ $soughts->name }}
                        @if (Auth::id()==$soughts->user->id)
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

            
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="ViewingAltItemModal">
        <x-slot name="title">
            Sought item: {{$ViewedAltItem->name}}
        </x-slot>
        <x-slot name="content">
            {{$ViewedAltItem->description}}

            <div class="flex flex-col">
                @foreach ($ViewedAltItem->founditems as $soughts)
                    <div class="bg-blue-200 hover:bg-sky-700 focus:bg-sky-700 active:bg-sky-900 m-2 p-3 lg:p-4 rounded-lg" wire:click="openModal({{ $soughts->id }})">
                        {{ $soughts->name }}
                        @if (Auth::id()==$ViewedAltItem->user->id)
                        <x-button class="ml-2" wire:click="" wire:loading.attr="disabled">
                            Mark as Found!
                        </x-button>
                        @endif
                    </div>
                @endforeach
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('ViewingAltItemModal')" wire:loading.attr="disabled">
                Close
            </x-secondary-button>
            @if ($ViewedAltItem->user && Auth::id()==$ViewedAltItem->user->id)
                <x-danger-button class="ml-2" wire:click="deleteSought({{ $ViewedAltItem->id }})" wire:loading.attr="disabled">
                    Delete Item
                </x-danger-button>
            @endif
        </x-slot>
    </x-dialog-modal>
    @if (!$found)
        {{ $this->sought()->links('vendor.pagination.tailwind') }}
    @else
        {{ $this->sought()->appends('found', $found)->links('vendor.pagination.tailwind') }}
    @endif
</div>
