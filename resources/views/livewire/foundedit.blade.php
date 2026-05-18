
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Editing Found Item: {{ $found->name }}
    </h1>
    <div class="flex flex-col gap-2">        
        <x-input placeholder="Nombre..." wire:model.defer="name"/>
        <x-input placeholder="Descripción..." wire:model.defer="desc"/>
        <div class="flex flex-row flex-wrap gap-2">
            <x-button wire:click="save()">
                Save
            </x-button>
            <a href="{{ route('dashboard') }}">
                <x-secondary-button>
                    Go Back
                </x-secondary-button>
            </a>
            <x-danger-button wire:click="$toggle('confirmingDeletion')">
                Delete
            </x-danger-button>
        </div>
    </div>
    <x-confirmation-modal wire:model="confirmingDeletion">
        <x-slot name="title">
            Delete Item
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete your item? Once your item is deleted, all of its resources and data will be permanently deleted.
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled">
                Nevermind
            </x-secondary-button>

            <x-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                Delete Account
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
