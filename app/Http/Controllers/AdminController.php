<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Family;
use App\Models\Admin as Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use LdapRecord\Container;
use App\Ldap\Admin as ldapAdmin;
use App\Models\Order\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Connection;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->connection = Container::getConnection('default');
        $this->middleware('auth:ldap_admin');
    }

    public function index()
    {
        // dd(Auth::user());
        // dd(Admin::where('email','alix@kw-distribution.com')->first());
        // dd(ldapAdmin::where('mail',Auth::user()->email)->first()->memberof[0]);

        $ldap_admin = ldapAdmin::where('mail',Auth::user()->email)->first();
        $new_user = User::where('compte_actif',0)->count();
        return view('admin.admin', compact('new_user','ldap_admin'));
    }

    public function showUser()
    {
        $new_user = User::where('compte_actif',0)->count();
        $ldap_admin = ldapAdmin::where('mail',Auth::user()->email)->first();

        $users_verified = User::where('compte_actif',0)->whereNotNull('email_verified_at')->get();
        $users_not_verified = User::where('compte_actif',0)->whereNull('email_verified_at')->get();

        return view('admin.newUser', compact('users_verified','users_not_verified','new_user','ldap_admin'));
    }

    public function banner()
    {
        $new_user = User::where('compte_actif',0)->count();
        $ldap_admin = ldapAdmin::where('mail',Auth::user()->email)->first();

        $families = Family::select('Id','Caption')->get();
        return view('admin.gestionBanner', compact('families','new_user','ldap_admin'));
    }

    public function bannerUpdate()
    {
        $uploads_dir = 'public/asset/banner';
        $tmp_name = $_FILES["banner"]["tmp_name"];
        // basename() peut empêcher les attaques de système de fichiers;
        // la validation/assainissement supplémentaire du nom de fichier peut être approprié
        if ($_POST["positionBanner"] == 'acceuil' ) {
            move_uploaded_file($tmp_name, __DIR__."/../../../".$uploads_dir . "/acceuil.jpg");
        }
        elseif ($_POST["positionBanner"] == 'boutique') {
            move_uploaded_file($tmp_name, __DIR__."/../../../".$uploads_dir . "/allItem.jpg");
        }
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
            $paramImport = "command_files_contact_add.txt";
            $dataImport = "add_contact.txt";
            $commande = 'C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /BatchFile="C:\laragon\www\testKw\storage\app\commande_ebp\command_files_contact_add.txt"';

            $first_ligne = "Civility;Name;FirstName;Phone;CellPhone;Email;typrContact;NomEntreprise;AssociatedCustomerId;xx_birthday;Status";
            $param = "\n".$user->civility.";".$user->name.";".$user->first_name.";".$user->phone.";".$user->cell_phone.";".$user->email.";Client/Prospect;".$user->compagny.";".$id_customer.";".$user->birthday.";1";

            $add_contact = fopen(__DIR__.'/../../../storage/app/commande_ebp/add_contact.txt', 'w+');
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

            rename(__DIR__."/../../../public/asset/document/newCustomer/".$user->name."".$user->first_name."/CGV.pdf", $target_file_cvg_signed);
            rename(__DIR__."/../../../public/asset/document/newCustomer/".$user->name."".$user->first_name."/RIB.pdf", $target_file_rib);
            rename(__DIR__."/../../../public/asset/document/newCustomer/".$user->name."".$user->first_name."/KBIS.pdf", $target_file_kbis);
            rmdir(__DIR__."/../../../public/asset/document/newCustomer/".$user->name."".$user->first_name);

            $paramImport = "command_files_customer_add.txt";
            $dataImport = "add_customer.txt";
            $commande = 'C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /BatchFile="C:\laragon\www\testKw\storage\app\commande_ebp\command_files_customer_add.txt"';

            $first_ligne = "code;civility;adresseFac1;adresseFac2;codePostalFac;villeFac;contactCivilite;contactPrénom;contactNom;contactPhone;contactCellPhone;ContactMail;siteWeb;adressLiv1;adressLiv2;codePostalLiv;villeLiv;codepaysBanque;domiciliation;bban;bic;iban;Nom;Naf;siret;pays;VAT";
            $param = "\n".$id_customer.";".$user->statut.";".$user->soc_fac_adr1.";".$user->soc_fac_adr2.";".$user->soc_fac_zc.";".$user->soc_fac_city.";".$user->civility.";".$user->first_name.";".$user->name.";".$user->phone.";".$user->cell_phone.";".$user->email.";".$user->website.";".$user->soc_liv_adr1.";".$user->soc_liv_adr2.";".$user->soc_liv_zc.";".$user->soc_liv_city.";".substr($user->rib_iban,0,2).";".$user->rib_domicil.";".substr($user->rib_iban,4).";".$user->rib_bic.";".$user->rib_iban.";".$user->compagny.";".$user->ape.";".$user->siret.";FR;".$user->vat_number;
            $add_customer = fopen(__DIR__.'/../../../storage/app/commande_ebp/add_customer.txt', 'w+');
            fputs($add_customer,$first_ligne);
            fputs($add_customer,$param);
            fclose($add_customer);
        }

        // $this->connexionSSHtest($commande,$paramImport,$dataImport);
        exec($commande);
        sleep(1);
        $new_contact = Contact::orderBy('sysCreatedDate', 'desc')->first();
        if (is_null($user->have_customer)) {
            $new_customer = Customer::orderBy('sysCreatedDate', 'desc')->first();
            $user->update(['have_customer' => $new_customer->UniqueId]);
        }
        $user->update(['IdUser' => $new_contact->Id]);
        return redirect()->route('admin.user')->with('success', 'L\'utilisateur a été validé .');
    }

    public function resend($id)
    {
        $user = User::find($id);
        $user->sendEmailVerificationNotification();
        return redirect()->route('admin.dashboard')->with('success', 'Un mail de vérification a été renvoyer .');
    }

    public function contactList()
    {
        if (isset($_GET['search']) && isset($_GET['actif'])) {

            if ($_GET['actif'] == 'notActif') {
                $contacts = Contact::where('IsWebContact','0')
                    ->whereNotNull('AssociatedCustomerId')
                    ->where(function ($query)
                    {
                        $cutomer = Customer::select('Id')->where('Name','like','%'.$_GET['search'].'%')->get();
                        $id_customer = array();
                        foreach ($cutomer as $cust ) {
                            array_push($id_customer,$cust->Id);
                        }
                        $query->where('ContactFields_Name','like','%'.$_GET['search'].'%')
                            ->orWhere('ContactFields_FirstName','like','%'.$_GET['search'].'%')
                            ->orWhereIn('AssociatedCustomerId',$id_customer);
                    })
                    ->orderBy('AssociatedCustomerId')
                    ->paginate(20);

            }elseif ($_GET['actif'] == 'actif') {
                $contacts = Contact::where('IsWebContact','1')
                    ->whereNotNull('AssociatedCustomerId')
                    ->where(function ($query)
                    {
                        $cutomer = Customer::select('Id')->where('Name','like','%'.$_GET['search'].'%')->get();
                        $id_customer = array();
                        foreach ($cutomer as $cust ) {
                            array_push($id_customer,$cust->Id);
                        }
                        $query->where('ContactFields_Name','like','%'.$_GET['search'].'%')
                            ->orWhere('ContactFields_FirstName','like','%'.$_GET['search'].'%')
                            ->orWhereIn('AssociatedCustomerId',$id_customer);
                    })
                    ->orderBy('AssociatedCustomerId')
                    ->paginate(20);

            }else {
                $contacts = Contact::whereNotNull('AssociatedCustomerId')
                    ->where(function ($query)
                    {
                        $cutomer = Customer::select('Id')->where('Name','like','%'.$_GET['search'].'%')->get();
                        $id_customer = array();
                        foreach ($cutomer as $cust ) {
                            array_push($id_customer,$cust->Id);
                        }

                        $query->where('ContactFields_Name','like','%'.$_GET['search'].'%')
                            ->orWhere('ContactFields_FirstName','like','%'.$_GET['search'].'%')
                            ->orWhereIn('AssociatedCustomerId',$id_customer);
                    })
                    ->orderBy('AssociatedCustomerId')
                    ->paginate(20);
            }
        }
        else{
            $contacts = Contact::orderBy('AssociatedCustomerId')->whereNotNull('AssociatedCustomerId')->paginate(20);
        }

        $ldap_admin = ldapAdmin::where('mail',Auth::user()->email)->first();
        $new_user = User::where('compte_actif',0)->count();
        return view('admin.contactlist',compact('contacts','new_user','ldap_admin'));
    }

    public function updateActiveContact($id)
    {
        $commande = 'C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /BatchFile="C:\laragon\www\testKw\storage\app\commande_ebp\command_files_update_contact_web_contact.txt"';
        $user_name = Contact::find($id)->ContactFields_Name;
        $first_ligne = "Code;Nom;contact Web";
        if ($_POST['active'] == 'activer') {
            $param = "\n".$id.";".$user_name.";1";

        }else{
            $param = "\n".$id.";".$user_name.";0";
        }
        $add_contact = fopen(__DIR__.'/../../../storage/app/commande_ebp/update_contact.txt', 'w+');
        fputs($add_contact,$first_ligne);
        fputs($add_contact,$param);
        fclose($add_contact);

        // $paramImport = "command_files_update_contact_web_contact.txt.txt";
        // $dataImport = "update_contact.txt";
        // $this->connexionSSHtest($commande,$paramImport,$dataImport);
        exec($commande);
        sleep(1);

        return redirect()->route('admin.allContact', array('search' => $_POST['search'] , 'actif' => $_POST['actif'], 'page' => $_POST['page']));
    }

    public function customerList()
    {

        //activeState->0-actif 1-en sommeil 2-bloquée 3-partiellemnt bloquée 4-default paiment
        if (isset($_GET['search']) && isset($_GET['actif'])) {

            if ($_GET['actif'] == 'sommeil') {
                $customers = Customer::where('ActiveState','1')
                    ->where(function ($query)
                    {
                        $query->where('Name','like','%'.$_GET['search'].'%')
                            ->orWhere('Id','like','%'.$_GET['search'].'%');
                    })
                    ->paginate(20);

            }elseif ($_GET['actif'] == 'actif') {
                $customers = Customer::where('ActiveState','0')
                    ->where(function ($query)
                    {
                        $query->where('Name','like','%'.$_GET['search'].'%')
                            ->orWhere('Id','like','%'.$_GET['search'].'%');
                    })
                    ->paginate(20);

            }elseif ($_GET['actif'] == 'pbloque') {
                $customers = Customer::where('ActiveState','3')
                    ->where(function ($query)
                    {
                        $query->where('Name','like','%'.$_GET['search'].'%')
                            ->orWhere('Id','like','%'.$_GET['search'].'%');
                    })
                    ->paginate(20);

            }elseif ($_GET['actif'] == 'bloque') {
                $customers = Customer::where('ActiveState','2')
                    ->where(function ($query)
                    {
                        $query->where('Name','like','%'.$_GET['search'].'%')
                            ->orWhere('Id','like','%'.$_GET['search'].'%');
                    })
                    ->paginate(20);

            }elseif ($_GET['actif'] == 'paiment') {
                $customers = Customer::where('ActiveState','4')
                    ->where(function ($query)
                    {
                        $query->where('Name','like','%'.$_GET['search'].'%')
                            ->orWhere('Id','like','%'.$_GET['search'].'%');
                    })
                    ->paginate(20);

            }else {

                $customers = Customer::where('Name','like','%'.$_GET['search'].'%')
                    ->orWhere('Id','like','%'.$_GET['search'].'%')
                    ->paginate(20);
            }
        }
        else{
            $customers = Customer::paginate(20);
        }

        $ldap_admin = ldapAdmin::where('mail',Auth::user()->email)->first();
        $new_user = User::where('compte_actif',0)->count();

        return view('admin.customerlist',compact('customers','new_user','ldap_admin'));
    }

    public function updateCustomer($id)
    {
        $commande = 'C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /BatchFile="C:\laragon\www\testKw\storage\app\commande_ebp\command_files_update_customer_acif.txt"';
        $user_name = Customer::find($id)->Name;
        $first_ligne = "Code;Nom;Status";
        // activeState->0-actif 1-en sommeil 2-bloquée 3-partiellemnt bloquée 4-default paiment
        if ($_POST['status'] == 'actif') {
            $param = "\n".$id.";".$user_name.";0";
        }elseif ($_POST['status'] == "sommeil") {
            $param = "\n".$id.";".$user_name.";1";
        }elseif ($_POST['status'] == "pbloque") {
            $param = "\n".$id.";".$user_name.";3";
        }elseif ($_POST['status'] == "bloque") {
            $param = "\n".$id.";".$user_name.";2";
        }elseif ($_POST['status'] == "paiment") {
            $param = "\n".$id.";".$user_name.";4";
        }
        $add_contact = fopen(__DIR__.'/../../../storage/app/commande_ebp/update_customer.txt', 'w+');
        fputs($add_contact,$first_ligne);
        fputs($add_contact,$param);
        fclose($add_contact);

        // $paramImport = "command_files_update_customer_acif.txt.txt";
        // $dataImport = "update_customer.txt";
        // $this->connexionSSHtest($commande,$paramImport,$dataImport);
        exec($commande);
        sleep(1);

        if ($_POST['status'] != 'actif') {
            $this->disableContact($id);
        }

        return redirect()->route('admin.allCustomer', array('search' => $_POST['search'] , 'actif' => $_POST['actif'], 'page' => $_POST['page']));
    }

    protected function disableContact($id_customer)
    {
        $contacts = Contact::where('AssociatedCustomerId',$id_customer)->get();
        // dd($contacts);
        $commande = 'C:\"Program Files"\EBP\Invoicing12.3FRFR30\EBP.Invoicing.Application.exe /Gui=false /BatchFile="C:\laragon\www\testKw\storage\app\commande_ebp\command_files_update_contact_web_contact.txt"';
        $first_ligne = "Code;Nom;contact Web";
        $update_contact = fopen(__DIR__.'/../../../storage/app/commande_ebp/update_contact.txt', 'w+');
        fputs($update_contact,$first_ligne);

        foreach ($contacts as $contact) {
            $param = "\n".$contact->Id.";".$contact->ContactFields_Name.";0";
            fputs($update_contact,$param);
        }

        fclose($update_contact);

        // $paramImport = "command_files_update_contact_web_contact.txt";
        // $dataImport = "update_contact.txt";
        // $this->connexionSSHtest($commande,$paramImport,$dataImport);
        exec($commande);
        sleep(1);

    }

    public function factureList()
    {
        $new_user = User::where('compte_actif',0)->count();
        $ldap_admin = ldapAdmin::where('mail',Auth::user()->email)->first();

        if (isset($_GET['search'])) {
            $orders = Order::where('NumberPrefix','FA')
                ->WhereIn('SettlementModeId',['CB','CBC','CB5804'])
                ->where('DocumentNumber',$_GET['search'])
                ->orderBy('sysCreatedDate','desc')
                ->paginate(10);
        }
        else {
            $orders = Order::where('NumberPrefix','FA')
                ->WhereIn('SettlementModeId',['CB','CBC','CB5804'])
                ->orderBy('sysCreatedDate','desc')
                ->paginate(10);
        }
        return view('admin.factureList',compact('orders','new_user','ldap_admin'));
    }

    public function devalidationFactureShow()
    {
        $new_user = User::where('compte_actif',0)->count();
        $ldap_admin = ldapAdmin::where('mail',Auth::user()->email)->first();

        return view('admin.devalidation',compact('new_user','ldap_admin'));
    }

    public function DevalidationFacture(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'search' => 'required|regex:/^FA[0-9]+$/'
        ]);

        if ($validated->fails()) {
            return redirect()
                        ->route('admin.direction.devalidation.facture.show')
                        ->withErrors($validated);
        }

        Order::where('DocumentNumber',$request->search)
            ->update(['ValidationState' => 0 , 'Hash_Hash_ChainedId' => null , 'Hash_Hash_Hash' => DB::raw('CONVERT(VARBINARY(MAX), null)')]);

        return redirect()->route('admin.direction.devalidation.facture.show');
    }



    public function connexionSSHtest(String $commande, String $paramImport, String $dataImport)
    {
        // // Notification à l'utilisateur si le serveur termine la connexion
        // function my_ssh_disconnect($reason, $message, $language) {
        //     printf("Serveur deconnecte avec l'erreur code [%d] et le message: %s\n",
        //         $reason, $message);
        // }
        // $callbacks = array('disconnect' => 'my_ssh_disconnect');

        // //connexion a la machine changer machine.domaine.tld par le FQDN(fully qualified domain name) de la machine cible et changer le port si necessaire
        // $connection = ssh2_connect('machine.domaine.tld', 22, array('hostkey'=>'ssh-dss'), $callbacks);
        // if (!$connection) die('Échec de la connexion');
        // echo 'connexion OK<br>';

        // // empreinte de la machine a laquelle on doit se connecter
        // $fingerprint = '5172E2D339863712D3D26D4860D976CD';
        // // vérification que l'on c'est bien connecter a la machine cible
        // if (ssh2_fingerprint($connection, SSH2_FINGERPRINT_MD5 | SSH2_FINGERPRINT_HEX) != $fingerprint)
        //     die ('<br>problème d\'identification du serveur: la signature reçue ne correspond pas à son empreinte enregistree!') ;

        // // conexion par clée public. remplacer les chemin jusqu'au clés par ceux corespondant et la passphrase
        // if (!ssh2_auth_pubkey_file($connection, 'user_B',
        //                         '/home/mon_user/.ssh/id_rsa.pub',
        //                         '/home/mon_user/.ssh/id_rsa', 'passphrase_cle_privee'))
        //     die("<br>Erreur lors de l'authentification par cle publique");
        // echo "<br>Authentification par cle publique reussie\n";


        // // transferts de fichiers dans les 2 sens peut etre nécessaire de l'utiliser pour envoyer les fichier contenant les commande et les imports vérifier le create_mode
        // ssh2_scp_send($connection, __DIR__.'/../../../storage/app/commande_ebp/'.$paramImport, 'tmp/param.local', 0644);
        // ssh2_scp_send($connection, __DIR__.'/../../../storage/app/commande_ebp/'.$dataImport, 'tmp/param.local', 0644);

        // //exécution command shell sur la machine destinataire
        // if (!$stream = ssh2_exec($connection, $commande)) {
        //     echo "<br />erreur d'exécution commande shell";
        // }

        // // sortie du résultat quand il y en a un
        // stream_set_blocking($stream, true);
        // $output = '';
        // while($ligne = fgets($stream)) {
        //     $output = $output . $ligne . '<br />';
        // }
        // echo $output;

        // // Sortie de l'erreur quand il y en a une
        // $stderr = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
        // stream_set_blocking($stderr, true);
        // $output = '';
        // while($ligne = fgets($stderr)) {
        //     $output = $output . $ligne . '<br />';
        // }
        // echo $output;
        // fclose($stderr);
        // fclose($stream);
        // ssh2_disconnect($connection);
    }
}
