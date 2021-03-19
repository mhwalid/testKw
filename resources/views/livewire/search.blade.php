<div class="row mb-2 mt-4">

    <nav id="Nav" class="navbar navbar-expand-lg navbar-dark indigo mb-4 with-full">
        <a class="navbar-brand" href="#">Navbar</a>

        <!-- Collapsible content -->
        <div class=" md-form my-0">
            <input wire:model="search" type="text"
                class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                placeholder="Search products by name...">
        </div>

    </nav>
    {{-- {{ dd($itemsComponen) }} --}}
    {{ count($itemsComponen) }}
    @foreach ($itemsComponen as $itemC)

        <div class="col-sm-6 col-lg-4 text-center item mb-4">

            <h5 class="font-black uppercase text-2xl mb-4">
                {{ $itemC->Id }}
            </h5>
            <h6 class="font-bold text-gray-700 text-xl mb-3">U$S {{ $itemC->CostPrice }}</h6>
            <p class="text-gray-900 font-normal mb-12">
                {{ $itemC->CostPrice }}
            </p>
            <div class="flex justify-end mt-5 absolute w-full bottom-0 left-0 pb-5">
                <button wire:click="addToCart({{ $itemC->CostPrice }})"
                    class="block uppercase font-bold text-green-600 hover:text-green-500 mr-4">
                    Add to cart
                </button>
            </div>

        </div>

    @endforeach


    {{-- <div class="w-full flex justify-center pb-6">
        {{ $itemsComponen->links('pagination::bootstrap-4') }}
    </div> --}}


</div>
