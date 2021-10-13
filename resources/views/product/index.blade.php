<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$category}}
        </h2>
    </x-slot>
    <div class="flex flex-wrap mt-5 justify-center">
        @foreach ($products as $product)
            @livewire('card-product', ['product' => $product])
        @endforeach
    </div>


</x-app-layout>