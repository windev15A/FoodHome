<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Catégories
        </h2>
    </x-slot>
    <div class="flex flex-wrap mt-5 justify-center">
        @foreach ($categories as $category)
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/10 mb-4 bg-gray-400 ml-3">
            @livewire('card-category', ['category' => $category])
        </div>
        @endforeach
    </div>    
      

</x-app-layout>