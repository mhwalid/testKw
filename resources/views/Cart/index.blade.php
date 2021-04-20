@extends('layouts.app')


@section('content')

    <div class="input-group mb-3">
        <div  class="" id="navbarSupportedContent">
            
            <form action="{{ route('search') }}" method="POST" class="form-inline ml-auto" onsubmit="traitForm(a)"
                id="SearchFrom">
                @csrf
                <div class="md-form my-0">
                    <input class="form-control" type="text" placeholder="Search" id="search" name="q"
                        value="{{ request()->q ?? '' }}">
                        
                </div>
                <button class="btn btn-outline-white btn-md my-0 ml-sm-2" onclick='showOld(event)'
                    type="text"></button>
            </form>
            <p id="url" style=""> {{ Request::path() }} </p>
            <div class="container" id="results">

            </div>



        </div>
    </div>

    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2  text-uppercase">Product</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Price</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">subTotal</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantity</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Remove</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Cart::content() as $item)
                                    {{ $arrivage = false }}
                                    <tr>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg"
                                                    alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h6 class="mb-0"> <a href="{{ route('product.show', $item->id) }}"
                                                            class="text-dark d-inline-block align-middle">{{ $item->name }}</a>
                                                    </h6>
                                                    <span
                                                        class="text-muted font-weight-normal font-italic d-block">Category:
                                                        Watches</span>
                                                </div>
                                            </div>
                                        </th>

                                        <td class="border-0 align-middle">{{ $item->subtotal() }}<strong></strong></td>
                                        <td class="border-0 align-middle">{{ $item->price }}<strong></strong></td>
                                        <td class="border-0 align-middle"> <select class="custom-select" name="qty" id="qty"
                                                data-id="{{ $item->rowId }}"
                                                data-stock="{{ intval($item->model->RealStock) }}"
                                                data-arrivage="{{ intval($item->model->arrivage->first()->Quantity ?? 0) }}">
                                               
                                                @for ($i = 1; $i <= $item->model->RealStock; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ $item->qty == $i ? 'selected' : '' }}>
                                                        {{ $i }}

                                                    </option>

                                                @endfor
                                            </select>
                                        </td>
                                        <td class="border-0 align-middle">
                                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-dark"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>

            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                        <div class="input-group mb-4 border rounded-pill p-2">
                            <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3"
                                class="form-control border-0">
                            <div class="input-group-append border-0">
                                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i
                                        class="fa fa-gift mr-2"></i>Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller
                    </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have some information for the seller you can leave them in the
                            box below</p>
                        <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have
                            entered.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">
                                    Subtotal </strong><strong>{{ Cart::subtotal() }}</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Tax</strong><strong>{{ Cart::tax() }}</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">{{ Cart::total() }} </h5>
                            </li>
                        </ul><a href="{{ route('checkout.index') }}"
                            class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection

@section('extra-js')
    <script>
        var qty = document.querySelectorAll('#qty');
        Array.from(qty).forEach((element) => {
            element.addEventListener('change', function() {
                var rowId = element.getAttribute('data-id');
                var stock = element.getAttribute('data-stock');
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch(`/panier/${rowId}`, {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'PATCH',
                    body: JSON.stringify({
                        qty: this.value,
                        stock: stock
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
    @include('include.Searchitem')
@endsection
