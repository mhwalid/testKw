@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('admin.allContact') }} " method="GET">
                <label for="search">{{ __('chercher un contact client :') }} </label>
                <input type="search" name="search" class="search" id="search-contact" placeholder="mettre le nom ou le prenom du contact ou le nom de l'entreprise">
                <select name="actif" id="actif">
                    <option @if (!isset($_GET["actif"]) || $_GET["actif"] == "tout") selected @endif value="tout">tout</option>
                    <option @if (isset($_GET["actif"]) && $_GET["actif"] == "actif") selected @endif value="actif">activer</option>
                    <option @if (isset($_GET["actif"]) && $_GET["actif"] == "notActif") selected @endif value="notActif">désactiver</option>
                </select>
                <input type="submit" value="search">
                @if(isset($_GET['search']) && isset($_GET['actif']))
                    <a class="btn btn-light" href="{{route('admin.allContact')}}">{{ __('tout afficher')}}</a>
                @endisset
            </form>
        </div>

        <h3>liste des contacts clients</h3>
        <div class="row justify-content-center">

            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Identity')}} </th>
                            <th scope="col">{{ __('Personal Phone Number')}} </th>
                            <th scope="col">{{ __('Compagny')}} </th>
                            <th scope="col">{{ __('Adress')}} </th>
                            <th scope="col">{{ __('Email')}} </th>
                            <th scope="col">{{ __('Register Date')}} </th>
                            <th scope="col">{{ __('compte actif')}} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>
                                @if ($contact->ContactFields_Civility != 'NULL')
                                    {{$contact->ContactFields_Civility }}
                                @endif
                                @if ($contact->ContactFields_Name != 'NULL')
                                    {{$contact->ContactFields_Name }}
                                @endif
                                @if ($contact->ContactFields_FirstName != 'NULL')
                                    {{$contact->ContactFields_FirstName }}
                                @endif
                            </td>
                            <td>
                                @if ($contact->ContactFields_Phone != 'NULL')
                                    {{$contact->ContactFields_Phone }}
                                @endif
                            </td>
                            <td>
                                @if ($contact->customer->Name != 'NULL')
                                    <a target="_blank" href="{{route('admin.allCustomer', array('search' => $contact->customer->Id , 'actif' => 'tout')) }}">{{$contact->customer->Name}}</a>
                                @endif
                            </td>
                            <td>
                                @if ($contact->AddressFields_Address1 != 'NULL')
                                    {{$contact->AddressFields_Address1 }}
                                @endif
                                @if ($contact->AddressFields_ZipCode != 'NULL')
                                    {{$contact->AddressFields_ZipCode }}
                                @endif
                                @if ($contact->AddressFields_City != 'NULL')
                                    {{$contact->AddressFields_City }}
                                @endif
                            </td>
                            <td>
                                @if ($contact->ContactFields_Email != 'NULL')
                                    <a href="mailto:{{$contact->ContactFields_Email }}">{{$contact->ContactFields_Email }}</a>
                                @endif
                            </td>
                            <td>{{$contact->sysCreatedDate }} </td>
                            <td>
                                <form action="{{ route('admin.update.contact.actif', $contact->Id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="search" @isset($_GET['search']) value="{{ $_GET['search'] }}" @else value="" @endisset >
                                    <input type="hidden" name="actif" @isset($_GET['actif']) value="{{ $_GET['actif'] }}" @else value="" @endisset>
                                    <input type="hidden" name="page" @isset($_GET['page']) value="{{ $_GET['page'] }}" @else value="" @endisset>

                                    @if ($contact->IsWebContact == 0)
                                        @if ($contact->customer->ActiveState == 0)
                                            <input class="btn btn-success" type="submit" name="active" value="activer">
                                        @elseif ($contact->customer->ActiveState == 1)
                                            <span>{{__('Entreprise en sommeil')}} </span>
                                        @elseif ($contact->customer->ActiveState == 2)
                                            <span>{{__('Entreprise bloqué')}} </span>
                                        @elseif ($contact->customer->ActiveState == 3)
                                            <span>{{__('Entreprise partiellement bloquée')}} </span>
                                        @elseif ($contact->customer->ActiveState == 4)
                                            <span>{{__('Entreprise en défault de paiment')}} </span>
                                        @endif
                                    @else
                                        <input class="btn btn-danger" type="submit" name="active" value="desactiver">
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p id="pagination" class="rounded-circle">
                    @if (isset($_GET["search"]))
                        {{$contacts->appends(['actif' => $_GET["actif"]])->appends(['search' => $_GET["search"]])->links('pagination::bootstrap-4')}}
                    @else
                        {{$contacts->links('pagination::bootstrap-4')}}
                    @endif
                </p>
            </div>
            <div class="rounded-circle" id="paginat"></div>
        </div>
        <p class="rounded-circle" id="url" style="display: none"> {{ Request::path() }} </p>
    </div>

@endsection
