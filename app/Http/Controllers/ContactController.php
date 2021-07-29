<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Order\Order;
use App\Models\Order\OrderLine;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index(){

        $contact = Auth::user()->contact;
        $customer = Customer::find($contact->AssociatedCustomerId);

        return  view('contact.index', compact('contact', 'customer'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'password' => ['nullable','string', 'min:8', 'confirmed'],
            'phoneNumber' => ['required','numeric'],
            'cellPhoneNumber' => ['nullable','numeric']
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact.index')
                ->withErrors($validator)
                ->withInput()
                ->with('error','erreur');
        }

        $user = User::where('IdUser',$request->input('id'))->first();
        $customer = Customer::where('UniqueId',$user->have_customer)->first();
        $id_customer = $customer->Id;

        if ($request->input('password') == "") {
            $user->update([
                    'name' => $request->input('name'),
                    'first_name' => $request->input('firstName'),
                    'phone' => $request->input('phoneNumber')
            ]);
        }
        else {
            $user->update([
                'name' => $request->input('name'),
                'first_name' => $request->input('firstName'),
                'password' =>  Hash::make($request->input('password')),
                'phone' => $request->input('phoneNumber')
            ]);
        }


        $commande = 'C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /BatchFile="C:\laragon\www\testKw\storage\app\commande_ebp\command_files_update_contact.txt"';

        $first_ligne = "Code;Name;FirstName;Phone;CellPhone;AssociatedCustomerId;Statut";
        $param = "\n".$request->input('id').";".$request->input('name').";".$request->input('firstName').";".$request->input('phoneNumber').";".$request->input('cellPhoneNumber').";".$id_customer.";".$request->input('status');

        $add_contact = fopen(__DIR__.'/../../../storage/app/commande_ebp/update_contact.txt', 'w+');
        fputs($add_contact,$first_ligne);
        fputs($add_contact,$param);
        fclose($add_contact);

        exec($commande);
        sleep(1);

        return redirect()->route('contact.index')->with('success','Les informations ont été modifier avec succès');
    }

    public function addContactShow()
    {
        return view('contact.addContact');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'firstName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneNumber' => ['required','numeric'],
            'cellPhoneNumber' => ['required','numeric']
        ]);
    }

    protected function create(array $data)
    {
        $customer = Customer::where('Id',$data['customerId'])->first();
        $bank_info = DB::connection('sqlsrv')->table('ThirdBankAccountDetail')->where('CustomerId',$customer->Id)->first();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['firstName'],
            'phone' => $data['phoneNumber'],
            'cell_phone' => $data['cellPhoneNumber'],
            'birthday' => $data['birthDate'],
            'civility' => $data['civility'],
            'newsletter' => $data['newsletter'],
            'adresse1' => 'vide',
            'adresse2' => 'vide',
            'zipcode' => 'vide',
            'city' => 'vide',
            'statut' => $customer->Civility,
            'compagny' => $customer->Name,
            'soc_email_compta' => $customer->xx_email_compta,
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
            'have_customer' => $customer->UniqueId,
        ]);
    }

    public function addContact(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        event(new Registered($user = $this->create($request->all())));


        return redirect()->route('contact.compagny')->with('success','un email de vérification a été envoyer a l\'adresse renseigner. Pour la valider penser a vous déconnectez ou à utilisez un autre navigateur, si une connexion vous est demandé utiliser les identifiants que vous venez de créer');
    }
}
