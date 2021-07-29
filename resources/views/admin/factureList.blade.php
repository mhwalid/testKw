@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('admin.factures') }} " method="GET">
                <label for="search">{{ __('chercher une facture :') }} </label>
                <input type="text" name="search" id="search" placeholder="entrer le numéro de la facture">
                <input type="submit" value="search">
                @if(isset($_GET['search']))
                    <a class="btn btn-light" href="{{route('admin.factures')}}">{{ __('tout afficher')}}</a>
                @endisset
            </form>

        </div>
        <h3>liste des factures</h3>
        <div class="row justify-content-center">

            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <th scope="col">{{ __('Numéro de Facture') }} </th>
                        <th scope="col">{{ __('Client')}} </th>
                        <th scope="col">{{ __('Total HT')}} </th>
                        <th scope="col">{{ __('Total TTC') }} </th>
                        <th scope="col">{{ __('Email')}} </th>
                        <th scope="col">{{ __('Action')}} </th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->DocumentNumber}} </td>
                            <td> {{--{{ $order->contact->ContactFields_Civility}} {{ $order->contact->ContactFields_Name}} {{ $order->contact->ContactFields_FirstName}}--}} {{ $order->customer->Name}} </td>
                            <td>{{ number_format($order->AmountVatExcludedWithDiscountAndShipping,2,'.','')}} €</td>
                            <td>{{ number_format($order->TotalDueAmount,2,'.','')}} €</td>
                            <td>{{ $order->customer->MainInvoicingContact_Email}} </td>
                            <td>
                                <form {{--action="{{ route('admin.update.contact.actif', $contact->Id) }}"--}} method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="search" @isset($_GET['search']) value="{{ $_GET['search'] }}" @else value="" @endisset >
                                    <input type="hidden" name="actif" @isset($_GET['actif']) value="{{ $_GET['actif'] }}" @else value="" @endisset>
                                    <input type="hidden" name="page" @isset($_GET['page']) value="{{ $_GET['page'] }}" @else value="" @endisset>


                                    <input class="btn btn-success" type="submit" name="active" value="envoyer">
                                </form>
                                <form {{--action="{{ route('admin.update.contact.actif', $contact->Id) }}"--}} method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="search" @isset($_GET['search']) value="{{ $_GET['search'] }}" @else value="" @endisset >
                                    <input type="hidden" name="actif" @isset($_GET['actif']) value="{{ $_GET['actif'] }}" @else value="" @endisset>
                                    <input type="hidden" name="page" @isset($_GET['page']) value="{{ $_GET['page'] }}" @else value="" @endisset>

                                    <input class="btn btn-danger" type="submit" name="active" value="supprimer">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p id="pagination" class="rounded-circle">
                    @if (isset($_GET["search"]) && isset($_GET["actif"]))
                        {{$orders->appends(['actif' => $_GET["actif"]])->appends(['search' => $_GET["search"]])->links('pagination::bootstrap-4')}}
                    @else
                        {{$orders->links('pagination::bootstrap-4')}}
                    @endif
                </p>
            </div>
            <div class="rounded-circle" id="paginat"></div>
        </div>
        <p class="rounded-circle" id="url" style="display: none"> {{ Request::path() }} </p>

        <form {{--action="{{ route('admin.update.contact.actif', $contact->Id) }}"--}} method="post">
            @csrf
            @method('PATCH')
            <label for="nfacture">numéro de facture</label>
            <input type="text" name="nFacture" id="nFacture">
            <label for="client">client</label>
            <input type="text" name="client" id="client">
            <label for="mail">mail</label>
            <input type="text" name="mail" id="mail">

            <input class="btn btn-success" type="submit" name="active" value="envoyer">
            <input class="btn btn-danger" type="submit" name="active" value="supprimer">
        </form>
    </div>

@endsection
