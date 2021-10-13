
<div class="md:flex justify-between items-center bg-yellow-50 border mx-5 px-2 shadow-2xl" >
       
    
    <img src="{{$image}}" class="rounded w-44">
    <h3 class="text-xl text-bold">{{$name}}</h3>
    <h3 class="text-xl text-bold">{{$price}}</h3>

    <div class="items-center">
        <button class="bg-gray-500 hover:bg-blue-400 text-black font-bold py-2 px-4 rounded" wire:click.debounce="$emit('minusQte','{{$rowId}}')">
            -
        </button>
        <input type="text" wire:model="quantity" value="{{$quantity}}" class="w-14 text-xl font-extrabold text-center rounded-full">
        <button class="bg-gray-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded" 
            wire:click.prevent="$emit('addedQte','{{$rowId}}')">
            +
        </button>
    </div>

    <button class="bg-red-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">
        X
    </button>

   
</div>