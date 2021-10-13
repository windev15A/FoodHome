
<div class="p-1">
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full " src="{{asset('images/'.$category->image)}}" alt="{{$category->name}}">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$category->name}}</div>
            <p class="text-gray-700 text-base  h-1">
                {{$category->description}}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <a href="{{ route('products.index',$category->name) }}"
                class=" bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Voir plus ...</a>
        </div>
    </div>
</div>