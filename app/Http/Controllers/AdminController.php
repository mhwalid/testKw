<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Family;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $new_user = User::where('compte_actif',0)->count();
        return view('admin.admin', compact('new_user'));
    }

    public function showUser()
    {
        $new_user = User::where('compte_actif',0)->count();
        $users_verified = User::where('compte_actif',0)->whereNotNull('email_verified_at')->get();
        $users_not_verified = User::where('compte_actif',0)->whereNull('email_verified_at')->get();

        return view('admin.newUser', compact('users_verified','users_not_verified','new_user'));
    }

    public function banner()
    {
        $new_user = User::where('compte_actif',0)->count();
        $families = Family::select('Id','Caption')->get();
        return view('admin.gestionBanner', compact('families','new_user'));
    }

    public function bannerUpdate()
    {
        $uploads_dir = 'public/asset/banner';
        $tmp_name = $_FILES["banner"]["tmp_name"];
        // basename() peut empêcher les attaques de système de fichiers;
        // la validation/assainissement supplémentaire du nom de fichier peut être approprié
        move_uploaded_file($tmp_name, __DIR__."/../../../".$uploads_dir . "/Visuel_maquette.jpg");
        return redirect()->route('admin.banner')->with('success','La bannière a été modifier');
    }
    public function familyBannerUpdate($family)
    {
        $uploads_dir = 'public/asset/banner';
        $tmp_name = $_FILES["banner"]["tmp_name"];
        // basename() peut empêcher les attaques de système de fichiers;
        // la validation/assainissement supplémentaire du nom de fichier peut être approprié
        move_uploaded_file($tmp_name, __DIR__."/../../../".$uploads_dir . "/".$family.".jpg");
        return redirect()->route('admin.banner')->with('success','La bannière a été modifier');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'L\'utilisateur a été supprimé .');
    }

    public function validateUser($id)
    {
        $user = User::find($id);
        $user->update(['compte_actif' => 1]);

        if ($user->have_customer != "0") {
            $customer = Customer::where('UniqueId',$user->have_customer)->first();
            $id_customer = $customer->Id;

            // écrire les info dans le fichier add_contact.txt
            $commande = 'C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /BatchFile="C:\laragon\www\testKw\public\asset\commande_ebp\command_files_contact_add.txt"';

            $first_ligne = "Civility;Name;FirstName;Phone;Email;typrContact;NomEntreprise;AssociatedCustomerId;xx_birthday";
            $param = "\n".$user->civility.";".$user->name.";".$user->first_name.";".$user->phone.";".$user->email.";Client/Prospect;".$user->compagny.";".$id_customer.";".$user->birthday;

            $add_contact = fopen(__DIR__.'/../../../public/asset/commande_ebp/add_contact.txt', 'w+');
            fputs($add_contact,$first_ligne);
            fputs($add_contact,$param);
            fclose($add_contact);


        } else if ($user->have_customer == "0") {
            // create new customer
            // create customer id using is name 3 first caracter of the name and the number + 1 of id with the same 3 letter
            $id_customer = str_replace(' ', '', $user->compagny);
            $id_customer = preg_replace('#Ç#', 'C', $id_customer);
            $id_customer = preg_replace('#ç#', 'c', $id_customer);
            $id_customer = preg_replace('#è|é|ê|ë#', 'e', $id_customer);
            $id_customer = preg_replace('#€|È|É|Ê|Ë#', 'E', $id_customer);
            $id_customer = preg_replace('#à|á|â|ã|ä|å#', 'a', $id_customer);
            $id_customer = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $id_customer);
            $id_customer = preg_replace('#ì|í|î|ï#', 'i', $id_customer);
            $id_customer = preg_replace('#Ì|Í|Î|Ï#', 'I', $id_customer);
            $id_customer = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $id_customer);
            $id_customer = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $id_customer);
            $id_customer = preg_replace('#ù|ú|û|ü#', 'u', $id_customer);
            $id_customer = preg_replace('#Ù|Ú|Û|Ü#', 'U', $id_customer);
            $id_customer = preg_replace('#ý|ÿ#', 'y', $id_customer);
            $id_customer = preg_replace('#Ý#', 'Y', $id_customer);
            $id_customer = preg_replace('#[^A-Za-z0-9]#', '', $id_customer);
            $id_customer = substr($id_customer,0,3);

            $id_customer = strtoupper($id_customer);

            $tmp_nbr = DB::connection('sqlsrv')->table('Customer')->where('Id','like',$id_customer."%")->count() + 1;

            if (strlen($tmp_nbr) == 1) {
                $id_customer = $id_customer."00".$tmp_nbr;
            }elseif(strlen($tmp_nbr) == 2){
                $id_customer = $id_customer."0".$tmp_nbr;
            }elseif (strlen($tmp_nbr) == 3) {
                $id_customer = $id_customer."".$tmp_nbr;
            }

            //add document to public/asset/document/customer/$id_customer
            $target_dir = __DIR__."/../../../public/asset/document/customers/".$id_customer."/";
            echo $target_dir ;
            if (!is_dir($target_dir)) {
                mkdir($target_dir);
            }

            $target_file_cvg_signed = $target_dir . "CGV.pdf";
            $target_file_rib = $target_dir . "RIB.pdf";
            $target_file_kbis = $target_dir . "KBIS.pdf";

            rename(__DIR__."/../../../public/asset/document/newCustomer/".$user->IdUser."/CGV.pdf", $target_file_cvg_signed);
            rename(__DIR__."/../../../public/asset/document/newCustomer/".$user->IdUser."/RIB.pdf", $target_file_rib);
            rename(__DIR__."/../../../public/asset/document/newCustomer/".$user->IdUser."/KBIS.pdf", $target_file_kbis);
            rmdir(__DIR__."/../../../public/asset/document/newCustomer/".$user->IdUser);

            $commande = 'C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /BatchFile="C:\laragon\www\testKw\public\asset\commande_ebp\command_files_customer_add.txt"';

            $first_ligne = "code;civility;adresseFac1;adresseFac2;codePostalFac;villeFac;contactCivilite;contactPrénom;contactNom;contactPhone;ContactMail;siteWeb;adressLiv1;adressLiv2;codePostalLiv;villeLiv;codepaysBanque;domiciliation;bban;bic;iban;Nom;Naf;siret;pays;VAT";
            $param = "\n".$id_customer.";".$user->statut.";".$user->soc_fac_adr1.";".$user->soc_fac_adr2.";".$user->soc_fac_zc.";".$user->soc_fac_city.";".$user->civility.";".$user->first_name.";".$user->name.";".$user->phone.";".$user->email.";".$user->website.";".$user->soc_liv_adr1.";".$user->soc_liv_adr2.";".$user->soc_liv_zc.";".$user->soc_liv_city.";".substr($user->rib_iban,0,2).";".$user->rib_domicil.";".substr($user->rib_iban,4).";".$user->rib_bic.";".$user->rib_iban.";".$user->compagny.";".$user->ape.";".$user->siret.";FR;".$user->vat_number;
            $add_customer = fopen(__DIR__.'/../../../public/asset/commande_ebp/add_customer.txt', 'w+');
            fputs($add_customer,$first_ligne);
            fputs($add_customer,$param);
            fclose($add_customer);
        }

        exec($commande);
        sleep(1);
        $new_contact = Contact::orderBy('sysCreatedDate', 'desc')->first();
        if ($user->have_customer == 0) {
            $new_customer = Customer::orderBy('sysCreatedDate', 'desc')->first();
            $user->update(['have_customer' => $new_customer->UniqueId]);
        }
        $user->update(['IdUser' => $new_contact->Id]);
        return redirect()->route('admin.dashboard')->with('success', 'L\'utilisateur a été validé .');
    }

    public function resend($id)
    {
        $user = User::find($id);
        $user->sendEmailVerificationNotification();
        return redirect()->route('admin.dashboard')->with('success', 'Un mail de vérification a été renvoyer .');
    }
}
