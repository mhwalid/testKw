@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('admin.allCustomer') }} " method="GET">
                <label for="search">{{ __('chercher une entreprise :') }} </label>
                <input type="search" name="search" class="search" id="search-customer" placeholder="mettre le nom ou l'Id de l'entreprise">
                <select name="actif" id="actif">
                    <option @if (!isset($_GET["actif"]) || $_GET["actif"] == "tout") selected @endif value="tout">tout</option>
                    <option @if (isset($_GET["actif"]) && $_GET["actif"] == "actif") selected @endif value="actif">activer</option>
                    <option @if (isset($_GET["actif"]) && $_GET["actif"] == "sommeil") selected @endif value="sommeil">en sommeil</option>
                    <option @if (isset($_GET["actif"]) && $_GET["actif"] == "pbloque") selected @endif value="pbloque">partiellement bloqué</option>
                    <option @if (isset($_GET["actif"]) && $_GET["actif"] == "bloque") selected @endif value="bloque">bloqué</option>
                    <option @if (isset($_GET["actif"]) && $_GET["actif"] == "paiment") selected @endif value="paiment">default de paiment</option>
                </select>
                <input type="submit" value="search">
                @if(isset($_GET['search']) && isset($_GET['actif']))
                    <a class="btn btn-light" href="{{route('admin.allCustomer')}}">{{ __('tout afficher')}}</a>
                @endisset
            </form>

        </div>

        <h3>liste des entreprises</h3>
        <div class="row justify-content-center">

            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Unique Id')}} </th>
                            <th scope="col">{{ __('Id')}} </th>
                            <th scope="col">{{ __('Nom')}} </th>
                            <th scope="col">{{ __('Statut sociale')}} </th>
                            <th scope="col">{{ __('Email Comptabilité')}} </th>
                            <th scope="col">{{ __('Adresse de facturation')}} </th>
                            <th scope="col">{{ __('Adresse de livraison')}} </th>
                            <th scope="col">{{ __('Numéro de téléphone')}} </th>
                            <th scope="col">{{ __('Siret')}} </th>
                            <th scope="col">{{ __('NAF')}} </th>
                            <th scope="col">{{ __('Nombre de contact')}} </th>
                            <th scope="col">{{ __('Etat')}} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{$customer->UniqueId }}</td>
                            <td>{{$customer->Id}} </td>
                            <td>
                                @if ($customer->Name != 'NULL')
                                    {{$customer->Name }}
                                @endif
                            </td>
                            <td>
                                @if ($customer->Civility != 'NULL')
                                    {{$customer->Civility }}
                                @endif
                            </td>
                            <td>
                                @if ($customer->xx_email_compta != 'NULL')
                                   <a href="mailto:{{$customer->xx_email_compta }}">{{$customer->xx_email_compta }}</a>
                                @endif
                            </td>
                            <td>
                                @if ($customer->MainInvoicingAddress_Address1 != 'NULL')
                                    {{$customer->MainInvoicingAddress_Address1 }}
                                @endif
                                @if ($customer->MainInvoicingAddress_Address2 != 'NULL')
                                    {{$customer->MainInvoicingAddress_Address2 }}
                                @endif
                                @if ($customer->MainInvoicingAddress_ZipCode != 'NULL')
                                    {{$customer->MainInvoicingAddress_ZipCode }}
                                @endif
                                @if ($customer->MainInvoicingAddress_City != 'NULL')
                                    {{$customer->MainInvoicingAddress_City }}
                                @endif
                            </td>
                            <td>
                                @if ($customer->MainDeliveryAddress_Address1 != 'NULL')
                                    {{$customer->MainDeliveryAddress_Address1 }}
                                @endif
                                @if ($customer->MainDeliveryAddress_Address2 != 'NULL')
                                    {{$customer->MainDeliveryAddress_Address2 }}
                                @endif
                                @if ($customer->MainDeliveryAddress_ZipCode != 'NULL')
                                    {{$customer->MainDeliveryAddress_ZipCode }}
                                @endif
                                @if ($customer->MainDeliveryAddress_City != 'NULL')
                                    {{$customer->MainDeliveryAddress_City }}
                                @endif
                            </td>
                            <td>
                                @if ($customer->MainDeliveryContact_Phone != 'NULL')
                                    {{$customer->MainDeliveryContact_Phone }}
                                @endif
                            </td>
                            <td>
                                @if ($customer->xx_siret != 'NULL')
                                    {{$customer->xx_siret }}
                                @endif
                            </td>
                            <td>
                                @if ($customer->NAF != 'NULL')
                                    {{$customer->NAF }}
                                @endif
                            </td>
                            <td>
                                @if (count($customer->contact) == 0)
                                    {{ __('Cette entreprise ne possèdent aucun contact')}}
                                @else
                                    <a target="_blank" href="{{route('admin.allContact', array('search' => $customer->Name , 'actif' => 'tout')) }}">{{count($customer->contact)}}</a>
                                @endif

                            </td>
                            <td>
                                <form action="{{ route('admin.update.customer', $customer->Id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="search" @isset($_GET['search']) value="{{ $_GET['search'] }}" @else value="" @endisset >
                                    <input type="hidden" name="actif" @isset($_GET['actif']) value="{{ $_GET['actif'] }}" @else value="" @endisset>
                                    <input type="hidden" name="page" @isset($_GET['page']) value="{{ $_GET['page'] }}" @else value="" @endisset>
                                    <select name="status" id="status">
                                        <option value="actif" @if($customer->ActiveState == 0) selected @endif>actif</option>
                                        <option value="sommeil" @if($customer->ActiveState == 1) selected @endif>en sommeil</option>
                                        <option value="pbloque" @if($customer->ActiveState == 3) selected @endif>partiellement bloqué</option>
                                        <option value="bloque" @if($customer->ActiveState == 2) selected @endif>bloqué</option>
                                        <option value="paiment" @if($customer->ActiveState == 4) selected @endif>défault de paiment</option>
                                    </select>

                                    <input class="btn btn-danger" type="submit" name="active" value="changer">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p id="pagination" class="rounded-circle">
                    @if (isset($_GET["search"]) && isset($_GET["actif"]))
                        {{$customers->appends(['actif' => $_GET["actif"]])->appends(['search' => $_GET["search"]])->links('pagination::bootstrap-4')}}
                    @else
                        {{$customers->links('pagination::bootstrap-4')}}
                    @endif
                </p>
            </div>
            <div class="rounded-circle" id="paginat"></div>
        </div>
        <p class="rounded-circle" id="url" style="display: none"> {{ Request::path() }} </p>
    </div>

@endsection
