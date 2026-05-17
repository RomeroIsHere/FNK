
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Sought Items:{{ $count }}
    </h1>
    <x-input placeholder="Buscar..." wire:model.live="where"/>
    <div class="flex flex-col">
        @foreach ($this->sought() as $soughts)
            <div class="bg-blue-200 hover:bg-sky-700 focus:bg-sky-700 active:bg-sky-900 m-2 p-3 lg:p-4 rounded-lg" wire:click="openModal({{ $soughts->id }})">
                {{ $soughts->name }}
            </div>
        @endforeach
    </div>
    @if (!$found)
    {{ $this->sought()->links('vendor.pagination.tailwind') }}
    @else
        {{ $this->sought()->appends('found', $found)->links('vendor.pagination.tailwind') }}
    @endif
</div>
