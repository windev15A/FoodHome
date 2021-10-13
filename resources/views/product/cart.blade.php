<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Panier
            </h2>

        </div>

       
        @if(session('success'))
        <div role="alert">
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                Success
            </div>
            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-red-700">
                <p>{{session('success')}}</p>

            </div>
        </div>
        @endif
        @if(session('danger'))
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Danger
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>{{session('danger')}}</p>

            </div>
        </div>
        @endif
    </x-slot>
    
    @if (count($products) > 0)
    @foreach ($products as $product)

    <div class="md:flex justify-between items-center bg-yellow-50 border mx-10 px-2 shadow-2xl mt-2">
        
        <img src="{{$product->model->image}}" class="rounded w-40 m-3">
        <h3 class="text-xl text-bold text-left">{{$product->name}}</h3>
        <h3 class="text-xl text-bold text-left">{{getPrice($product->subTotal())}}</h3>

        <div class="items-center">
            <div class="flex">
                <label class="block w-3/12">
                    <select name="qty" id="qty" data-id="{{$product->rowId}}">
                        @for ($i = 1; $i < 10; $i++) <option value="{{$i}}" {{ $product->qty == $i ? 'selected' : ''}}>{{$i}}</option>
                            @endfor

                    </select>
                </label>
            </div>

        </div>
        <form action="{{route('panier.destroy', $product->rowId)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>
    @endforeach

    <div class="my-2 md:my-3 container mx-auto flex flex-col md:flex-row shadow-sm overflow-hidden"
        x-data="{ testimonialActive: 2 }" x-cloak>
        <div class="relative w-full py-2 md:py-24 bg-indigo-700 md:w-1/2 flex flex-col item-center justify-center">

            <div class="absolute top-0 left-0 z-10 grid-indigo w-16 h-16 md:w-40 md:h-40 md:ml-20 md:mt-24"></div>

            <div
                class="relative text-2xl md:text-5xl py-2 px-6 md:py-6 md:px-1 md:w-64 md:mx-auto text-indigo-100 font-semibold leading-tight tracking-tight mb-0 z-20">
                <span class="md:block">What Our</span>
                <span class="md-block">Customers</span>
                <span class="block">Are Saying!</span>
            </div>


        </div>

        <div class="bg-gray-100 md:w-1/2">
            <div class="flex flex-col h-full relative">

                <h1 class="bg-gray-200 text-3xl mt-2 font-bold border rounded-full px-2 text-center self-center">Détails
                    de la commande</h1>
                <div class="flex justify-between mx-5 my-5">
                    <h2 class="text-2xl text-left">Sous-total </h2>
                    <h2 class="text-2xl text-left">{{getPrice(Cart::subtotal())}} </h2>
                </div>
                <div class="flex justify-between mx-5 my-2 pb-2   border-b-2 border-gray-400 ">
                    <h2 class="text-2xl text-left">TVA (5.5%) </h2>
                    <h2 class="text-2xl text-left">{{getPrice(Cart::tax())}} </h2>
                </div>
                <div class="flex justify-between mx-5 my-1 ">
                    <h2 class="text-2xl text-left">Total </h2>
                    <h2 class="text-2xl text-left">{{getPrice(Cart::total())}} </h2>
                </div>
                <div class="flex flex-col h-full relative items-end mt-10">
                    <form action="#" method="#">
                        @csrf
                        <button type="submit"
                            class="bg-black mr-2 text-white text-xl focus:outline-none hover:opacity-100 hover:text-gray-900 rounded-full px-10 py-2 font-semibold">
                            <i class="far fa-credit-card self-center"></i>
                            Passer à la caisse
                        </button>
                    </form>
                </div>




            </div>
        </div>
    </div>
    @else
    <div class="flex items-center p-5 lg:p-10 overflow-hidden relative">
        <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10  mx-auto text-gray-800 relative md:text-center">
            <h2 class="text-3xl">Votre panier est tristement <h1 class="text-5xl">Vide</h1>
            </h2>
            <h1><i class="fas fa-sad-tear fa-5x"></i></h1>
            <h3 class="text-3xl">Trouver votre bonheur <a href="{{route('home')}}" class="text-3xl text-blue-500">ICI
                </a></h3>
        </div>
    </div>
    @endif

    <script>
        var qty = document.querySelectorAll('#qty');
        Array.from(qty).forEach((element) => {
        element.addEventListener('change', function () {
            var rowId = this.getAttribute('data-id');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(`/panier/${rowId}`,
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'PATCH',
                    body: JSON.stringify({
                        qty: this.value
                    })
            }).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            });
        });
    });
    </script>


</x-app-layout>