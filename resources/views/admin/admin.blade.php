@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3>user with not verified email</h3>
            <div class="col-15">
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">{{ __('Identity')}} </th>
                        <th scope="col">{{ __('Personal Phone Number')}} </th>
                        <th scope="col">{{ __('Compagny')}} </th>
                        <th scope="col">{{ __('Statut')}} </th>
                        <th scope="col">{{ __('Siret')}} </th>
                        <th scope="col">{{ __('APE')}} </th>
                        <th scope="col">{{ __('Adress')}} </th>
                        <th scope="col">{{ __('Compagny Phone Number')}} </th>
                        <th scope="col">{{ __('Website')}} </th>
                        <th scope="col">{{ __('Bank : Domiciliation')}} </th>
                        <th scope="col">{{ __('IBAN')}} </th>
                        <th scope="col">{{ __('BIC')}} </th>
                        <th scope="col">{{ __('Register Date')}} </th>
                        <th scope="col">{{ __('Have Customer')}} </th>
                        <th scope="col">{{ __('Confirmation')}} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users_not_verified as $user)
                        <tr>
                            <td>{{ $user->civility }} {{ $user->name }} {{ $user->first_name }}</td>
                            <td>{{$user->phone }} </td>
                            <td>{{$user->compagny }} </td>
                            <td>{{$user->statut }} </td>
                            <td>{{$user->siret }} </td>
                            <td>{{$user->ape }} </td>
                            <td>{{$user->soc_fac_adr1 }} {{$user->soc_fac_zc }} {{$user->soc_fac_city }}</td>
                            <td>{{$user->soc_tel }} </td>
                            <td>{{$user->website }} </td>
                            <td>{{$user->rib_domicil }} </td>
                            <td>{{$user->rib_iban }} </td>
                            <td>{{$user->rib_bic }} </td>
                            <td>{{$user->date_inscription }} </td>
                            <td>
                                @if ($user->have_customer != "0")
                                    <span>{{__('Yes')}} </span>
                                @else
                                    <span>{{__('No')}}</span>
                                    <a href="{{asset('asset/document/newCustomer/'.$user->IdUser.'/CGV.pdf')}}" target="_blank">GCI</a>
                                    <a href="{{asset('asset/document/newCustomer/'.$user->IdUser.'/RIB.pdf')}}" target="_blank">RIB</a>
                                    <a href="{{asset('asset/document/newCustomer/'.$user->IdUser.'/KBIS.pdf')}}" target="_blank">KBIS</a>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.resend.user', $user->id) }}" method="post">
                                    @csrf
                                    <input class="btn btn-light" type="submit" value="resend">
                                </form>

                                <form action="{{ route('admin.delete.user', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="delete">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <h3>user with verified email</h3>
            <div class="col-15">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Identity')}} </th>
                            <th scope="col">{{ __('Personal Phone Number')}} </th>
                            <th scope="col">{{ __('Compagny')}} </th>
                            <th scope="col">{{ __('Statut')}} </th>
                            <th scope="col">{{ __('Siret')}} </th>
                            <th scope="col">{{ __('APE')}} </th>
                            <th scope="col">{{ __('Adress')}} </th>
                            <th scope="col">{{ __('Compagny Phone Number')}} </th>
                            <th scope="col">{{ __('Website')}} </th>
                            <th scope="col">{{ __('Bank : Domiciliation')}} </th>
                            <th scope="col">{{ __('IBAN')}} </th>
                            <th scope="col">{{ __('BIC')}} </th>
                            <th scope="col">{{ __('Register Date')}} </th>
                            <th scope="col">{{ __('Have Customer')}} </th>
                            <th scope="col">{{ __('Confirmation')}} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users_verified as $user)
                        <tr>
                            <td>{{ $user->civility }} {{ $user->name }} {{ $user->first_name }}</td>
                            <td>{{$user->phone }} </td>
                            <td>{{$user->compagny }} </td>
                            <td>{{$user->statut }} </td>
                            <td>{{$user->siret }} </td>
                            <td>{{$user->ape }} </td>
                            <td>{{$user->soc_fac_adr1 }} {{$user->soc_fac_zc }} {{$user->soc_fac_city }}</td>
                            <td>{{$user->soc_tel }} </td>
                            <td>{{$user->website }} </td>
                            <td>{{$user->rib_domicil }} </td>
                            <td>{{$user->rib_iban }} </td>
                            <td>{{$user->rib_bic }} </td>
                            <td>{{$user->date_inscription }} </td>
                            <td>
                                @if ($user->have_customer != "0")
                                    <span>{{__('Yes')}} </span>
                                @else
                                    <span>{{__('No')}}</span>
                                    <a href="{{asset('asset/document/newCustomer/'.$user->IdUser.'/CGV.pdf')}}" target="_blank">GCI</a>
                                    <a href="{{asset('asset/document/newCustomer/'.$user->IdUser.'/RIB.pdf')}}" target="_blank">RIB</a>
                                    <a href="{{asset('asset/document/newCustomer/'.$user->IdUser.'/KBIS.pdf')}}" target="_blank">KBIS</a>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.validate.user', $user->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input class="btn btn-light" type="submit" value="validate">
                                </form>

                                <form action="{{ route('admin.delete.user', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="delete">
                                </form>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
