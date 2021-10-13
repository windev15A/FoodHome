<div>
    <div class="p-1">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{$product->image}}" alt="{{$product->name}}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$product->name}}</div>
                    <p class="text-gray-700 text-base overflow-hidden h-12">
                        {{$product->description}}
                    </p>
                </div>
                <div class="flex justify-between px-6 pt-4 pb-2">
                    <span class=" bg-gray-300 rounded-full px-3 py-1 text-base font-bold text-gray-700 mr-2 mb-2">
                        {{number_format($product->amount, 2). '€'}}
                    </span>
                        <a href="{{ route('products.show',$product->name) }}"
                            class=" bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Voir
                            plus ...</a>    
                </div>
            </div>
        </div>
</div>