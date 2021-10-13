<x-app-layout>
    <div class="min-w-screen min-h-screen flex items-center p-2 lg:p-10 overflow-hidden relative">
        <div
            class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
            <div class="md:flex items-center -mx-10">
                <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                    <div class="relative">
                        <img src="{{$product->image}}" class="w-full relative z-10" alt="">
                        <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-10">
                    <div class="mb-10">
                        <h1 class="font-bold uppercase text-2xl mb-5">{{$product->name}}</h1>
                        <p class="text-sm">{{$product->description}}</p>
                    </div>
                    <div>
                        <div class="inline-block align-bottom mr-5">
                            
                            <span
                                class="font-bold text-5xl leading-none align-baseline">{{number_format($product->amount,2)}}
                            </span>
                            <span class="text-2xl leading-none align-baseline">€</span>
                        </div>
                        <div class="inline-block align-bottom">
                            <form action="{{route('cart.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <button type="submit"
                                    class="bg-yellow-300 opacity-75 focus:outline-none hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold">
                                    <i class="fas fa-shopping-basket"></i>
                                    Ajouter au panier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>