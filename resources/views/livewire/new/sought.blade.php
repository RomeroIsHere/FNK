
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Creating New Sought Item
    </h1>
    <div class="flex flex-col gap-2">        
        <x-input placeholder="Nombre..." wire:model.defer="name"/>
        <x-input placeholder="Descripción..." wire:model.defer="desc"/>
        <div class="flex flex-row flex-wrap gap-2">
            <x-button wire:click="save()">
                Save
            </x-button>
            <x-danger-button wire:click="$toggle('confirmingDeletion')">
                Leave
            </x-danger-button>
        </div>
    </div>
    <x-confirmation-modal wire:model="confirmingDeletion">
        <x-slot name="title">
            Leave
        </x-slot>

        <x-slot name="content">
            Are you sure you want to Leave without Registering this new item?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled">
                Nevermind
            </x-secondary-button>
            <a href="{{ route('dashboard') }}">
                <x-danger-button class="ml-2" wire:loading.attr="disabled">
                    Leave
                </x-danger-button>
            </a>
        </x-slot>
    </x-confirmation-modal>
</div>
