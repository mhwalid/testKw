<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneNumber' => ['required','numeric'],
            'siret' => ['unique:App\Models\Customer,xx_siret','digits:14' ,'nullable'],
            'socialReason' => ['regex:/^[^a-z]+$/','nullable'],
            'ape' => ['regex:/^[0-9]{4}[A-Z]$/','nullable','exists:sqlsrv.Naf,Id'],
            'webSite' => ['url','nullable'],
            'iban' => ['regex:/^[A-Z]{2}[0-9]{2}[0-9]{5}[0-9]{5}[0-9a-zA-Z]{11}[0-9]{2}$/','size:27','nullable'],
            'bic' => ['between:8,11','nullable'],
            'compagnyId' => ['exists:App\Models\Customer,UniqueId','nullable']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $id_contact = Str::uuid();
        $id_contact = strtoupper($id_contact);

        if ($data['haveCustomer'] == 0) {

            //create vat number
            $vat_number = (12 + 3 * (substr($data['siret'],0,9) % 97)) % 97;
            if (strlen($vat_number) == 1) {
                $vat_number = "0".$vat_number;
            }
            $vat_number = 'FR'.$vat_number.substr($data['siret'],0,9);

            //add document to public/asset/document/newCustomer/$id_contact

            $target_dir = __DIR__."/../../../../public/asset/document/newCustomer/".$id_contact."/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir);
            }
            $target_file_cvg_signed = $target_dir ."CGV.pdf";
            $target_file_rib = $target_dir . "RIB.pdf";
            $target_file_kbis = $target_dir . "KBIS.pdf";
            move_uploaded_file($_FILES["cgv_signed"]["tmp_name"],$target_file_cvg_signed);
            move_uploaded_file($_FILES["rib"]["tmp_name"],$target_file_rib);
            move_uploaded_file($_FILES["kbis"]["tmp_name"],$target_file_kbis);

            return User::create([
                'IdUser' => $id_contact,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'first_name' => $data['firstName'],
                'phone' => $data['phoneNumber'],
                'birthday' => $data['birthDate'],
                'civility' => $data['civility'],
                'newsletter' => $data['newsletter'],
                'adresse1' => 'vide',
                'adresse2' => 'vide',
                'zipcode' => 'vide',
                'city' => 'vide',
                'statut' => $data['formeJuridique'],
                'compagny' => $data['socialReason'],
                'siret' => $data['siret'],
                'ape' => $data['ape'],
                'vat_number' => $vat_number,
                'soc_fac_adr1' => $data['invoicingAdress'],
                'soc_fac_adr2' => $data['invoicingAdressNext'],
                'soc_fac_zc' => $data['invoivingZipCode'],
                'soc_fac_city' => $data['invoicingCity'],
                'soc_tel' => $data['invoicingPhoneNumber'],
                'soc_liv_adr1' => $data['deliveryAdressInput'],
                'soc_liv_adr2' => $data['deliveryAdressNext'],
                'soc_liv_zc' => $data['deliveryZipCode'],
                'soc_liv_city' => $data['deliveryCity'],
                'ifSameAdress' => $data['sameDeliveryInvoicing'],
                'website' => $data['webSite'],
                'rib_domicil' => $data['domiciliation'],
                'rib_iban' => $data['iban'],
                'rib_bic' => $data['bic'],
                'rib_iso' => substr($data['iban'],0,2),
                'rib_compte' => substr($data['iban'],14,11),
                'date_inscription' => date('Y-m-d'),
                'have_customer' => $data['haveCustomer'],
            ]);
        }else if ($data['haveCustomer'] != 0) {
            $customer = Customer::where('UniqueId',$data['compagnyId'])->first();
            $bank_info = DB::connection('sqlsrv')->table('ThirdBankAccountDetail')->where('CustomerId',$customer->Id)->first();

            return User::create([
                'IdUser' => $id_contact,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'first_name' => $data['firstName'],
                'phone' => $data['phoneNumber'],
                'birthday' => $data['birthDate'],
                'civility' => $data['civility'],
                'newsletter' => $data['newsletter'],
                'adresse1' => 'vide',
                'adresse2' => 'vide',
                'zipcode' => 'vide',
                'city' => 'vide',
                'statut' => $customer->Civility,
                'compagny' => $customer->Name,
                'siret' => $customer->xx_siret ,
                'ape' => $customer->NAF,
                'vat_number' => $customer->IntracommunityVATNumber,
                'soc_fac_adr1' => $customer->MainInvoicingAddress_Address1,
                'soc_fac_adr2' => $customer->MainInvoicingAddress_Address2,
                'soc_fac_zc' => $customer->MainInvoicingAddress_ZipCode,
                'soc_fac_city' => $customer->MainInvoicingAddress_City,
                'soc_tel' => $customer->MainInvoicingContact_Phone,
                'soc_liv_adr1' => $customer->MainDeliveryAddress_Address1,
                'soc_liv_adr2' => $customer->MainDeliveryAddress_Address2,
                'soc_liv_zc' => $customer->MainDeliveryAddress_ZipCode,
                'soc_liv_city' => $customer->MainDeliveryAddress_City,
                'ifSameAdress' => $customer->UseInvoicingAddressAsDeliveryAddress,
                'website' => $customer->MainInvoicingAddress_WebSite,
                'rib_domicil' => $bank_info->AccountDetail_Caption,
                'rib_iban' => $bank_info->AccountDetail_InternationalBankAccountNumber,
                'rib_bic' => $bank_info->AccountDetail_BankIdentifierCode,
                'rib_iso' => $bank_info->AccountDetail_CountryIsoCode,
                'rib_compte' => substr($bank_info->AccountDetail_InternationalBankAccountNumber,14,11),
                'date_inscription' => date('Y-m-d'),
                'have_customer' => $data['compagnyId'],
            ]);
        }
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect()->route('verification.notice');

    }
}
