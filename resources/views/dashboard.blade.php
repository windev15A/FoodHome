<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-col">

        <div class="mt-1 w-1/2 m-auto">
            @if(session('success'))
            <div role="alert mx-1/2">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    Success
                </div>
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-red-700">
                    <p>{{session('success')}}</p>

                </div>
            </div>
            @endif
        </div>
        <div class="flex flex-wrap mt-5 justify-center">

            @foreach ($categories as $category)
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/10 mb-4 bg-gray-400 ml-3">
                @livewire('card-category', ['category' => $category])
            </div>
            @endforeach
        </div>

    </div>



</x-app-layout>