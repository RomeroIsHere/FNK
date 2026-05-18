<x-app-layout>
    <x-slot name="header">
        <h2 class=" text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }} <bold class="font-bold">{{ Auth::user()->name }}</bold>!
        </h2>
    </x-slot>
    <div class="flex flex-wrap items-center">
        <div class="py-12 w-full sm:w-1/2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @livewire('found', ['UserId' => Auth::id()])
                    <a href='{{ route("found") }}'>
                        <x-button class="w-[calc(100%-2rem)] m-4" >
                            +
                        </x-button>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="py-12 w-full sm:w-1/2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @livewire('search', ['UserId' => Auth::id()])
                    <a href='{{ route("sought") }}'>
                        <x-button class="w-[calc(100%-2rem)] m-4">
                            +
                        </x-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @livewire('found-modal')
    @livewire('sought-modal')
</x-app-layout>
