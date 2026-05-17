<x-app-layout>
    <div class="flex flex-wrap items-center">
        <div class="py-12 w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @livewire('found')
                </div>
            </div>
        </div>
    </div>
    @livewire('found-modal')
    @livewire('sought-modal')
</x-app-layout>
