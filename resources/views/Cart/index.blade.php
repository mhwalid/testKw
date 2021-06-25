@extends('layouts.app')


@section('content')

    <div class="input-group mb-3">
        <div  class="" id="navbarSupportedContent">

            <form action="{{ route('search') }}" method="POST" class="form-inline ml-auto" onsubmit="traitForm(a)"
                id="SearchFrom">
                @csrf

                <button class="btn btn-outline-white btn-md my-0 ml-sm-2" onclick='showOld(event)'
                    type="text"></button>
            </form>
            <p id="url" style="display:none"> {{ Request::path() }} </p>
            <div class="container" id="results">
            </div>
        </div>
    </div>


    <div class="pb-5">
    <p class="news">Panier</p>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                    <!-- Shopping cart table -->
                    <div class="table-responsive" style="border-radius: 200px;">
                        <table class="table" style=" margin-bottom: 0px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="background-color: #D6D1C1" class="border-0 ">
                                        <div class="p-2  text-uppercase">Produit</div>
                                    </th>
                                    <th scope="col" style="background-color: #D6D1C1" class="border-0 ">
                                        <div class="py-2 text-uppercase">Prix</div>
                                    </th>
                                    <th scope="col" style="background-color: #D6D1C1" class="border-0 ">
                                        <div class="py-2 text-uppercase">Sous-Total</div>
                                    </th>
                                    <th scope="col" style="background-color: #D6D1C1" class="border-0 ">
                                        <div class="py-2 text-uppercase">Quantité</div>
                                    </th>
                                    <th scope="col" style="background-color: #D6D1C1" class="border-0 ">
                                        <div class="py-2 text-uppercase">Supprimer</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Cart::content() as $item)
                                    {{ $arrivage = false }}

                                    <tr>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="{{asset('asset/item/images/'.$item->id.'/Cart1.jpg')}}"
                                                    alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h6 class="mb-0"> <a href="{{ route('product.show', $item->id) }}"
                                                            class="text-dark d-inline-block align-middle">{{ $item->name }}</a>
                                                    </h6>
                                                    <span
                                                        class="text-muted font-weight-normal font-italic d-block">Catégorie:
                                                        Watches</span>
                                                </div>
                                            </div>
                                        </th>


                                        <td class="border-0 align-middle">{{ $item->price }}<strong></strong></td>
                                        <td class="border-0 align-middle">{{ $item->subtotal() }}<strong></strong></td>
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
                    <form class="mx-4" action="{{ route('checkout.index', 'test') }}" method="post">    {{ csrf_field() }}
                    <div style="background-color: #D6D1C1" class=" rounded-pill px-4 py-3 text-uppercase font-weight-bold">Mode de paiement</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                        <div class="input-group mb-4 border  p-2 d-flex flex-column">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="carte" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                  Carte bancaire 
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="virement">
                                <label class="form-check-label" for="exampleRadios2">
                                   Virement bancaire
                                </label>
                              </div>
                              <div class="form-check ">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="retrait" >
                                <label class="form-check-label" for="exampleRadios3">
                                    Retrait bancaire
                                </label>
                              </div>
                        </div>
                    </div>
                    {{-- <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller
                    </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have some information for the seller you can leave them in the
                            box below</p>
                        <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                    </div> --}}
                    <button  type="submit" class="btn boutton col-6 ">Procédez au règlement</button>
                </form>

                </div>
                <div class="col-lg-6">
                    <div style="background-color: #D6D1C1" class="bg-red rounded-pill px-4 py-3 text-uppercase font-weight-bold">Récapitulatif de la commande </div>
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
                        </ul>
                       
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    </div>

@endsection

@section('extra-js')
@include('include.Searchitem')

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
@endsection