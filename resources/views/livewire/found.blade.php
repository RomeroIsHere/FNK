
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Found Items: {{ $count=10 }}
    </h1>
    <div class="flex flex-col">
        @for ($i = 0; $i < $count; $i++)
            <div class="bg-blue-200 m-2 p-3 lg:p-4 rounded-lg">
                {{ $i }}
            </div>
        @endfor
    </div>
</div>
