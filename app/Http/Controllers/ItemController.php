<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Contact;
use App\Models\Family;
use App\Models\Item;
use App\Models\SaleDocumentLine;
use App\Models\MainCarac;
use App\Models\SubFamily;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class ItemController extends Controller
{
    private function getPrice($items)
    {
        // $Families = Family::all()->sortBy('MainIntervener')->groupBy('MainIntervener');
        // $items = Item::itemA()->paginate(20);
        $id_customer = '';
        $price_item_client = [];
        $price_item_famy = [];
        $hidden_item = [];

        if (!is_null( Auth::user()) && !is_null(Auth::user()->email_verified_at) && Auth::user()->compte_actif ==1) {

            $id_customer = Auth::user()->Contact->Customer->Id;
            $id_customer_family = Auth::user()->Contact->Customer->FamilyId;
            $prices_client = DB::connection('sqlsrv')->table('PriceListInclusionLine')->select('PriceListId','StartElementId')
            ->where('InclusionType','<>','128')
            ->where('InclusionType','<>','32')
            ->whereIn('PriceListId',function ($query) use ($id_customer) {
                $query->select('PriceListId')
                ->from('PriceListInclusionLine')
                ->where('StartElementId','=',$id_customer)
                ->where('InclusionType','128');
            })
            ->get();

            $prices_famy = DB::connection('sqlsrv')->table('PriceListInclusionLine')->select('PriceListId','StartElementId')
            ->where('InclusionType','<>','128')
            ->where('InclusionType','<>','32')
            ->whereIn('PriceListId',function ($query) use ($id_customer_family) {
                $query->select('PriceListId')
                ->from('PriceListInclusionLine')
                ->where('StartElementId', $id_customer_family)
                ->where('InclusionType', '=', '32');
            })
            ->get();

            foreach ($prices_client as $price) {
                $type_discount = DB::connection('sqlsrv')->table('PriceList')->select('Type')->where('Id',$price->PriceListId)->first();
                $tmp_value = DB::connection('sqlsrv')->table('PriceListCalculationLine')->select('DiscountValue')->where('PriceListId',$price->PriceListId)->first();
                if ($tmp_value->DiscountValue == -1 && $type_discount->Type == 1) {
                    $hidden_item[$price->StartElementId] = $tmp_value->DiscountValue;
                }
                elseif ($type_discount->Type == 1) {
                    $price_item_client[$price->StartElementId] = $tmp_value->DiscountValue;
                }
                elseif ($type_discount->Type == 2) {
                    $discount_item_client[$price->StartElementId] = $tmp_value->DiscountValue;
                }

            }
            foreach ($prices_famy as $price) {
                $type_discount = DB::connection('sqlsrv')->table('PriceList')->select('Type')->where('Id',$price->PriceListId)->first();
                $tmp_value = DB::connection('sqlsrv')->table('PriceListCalculationLine')->select('DiscountValue')->where('PriceListId',$price->PriceListId)->first();
                if ($tmp_value->DiscountValue == -1 && $type_discount->Type == 1) {
                    $hidden_item[$price->StartElementId] = $tmp_value->DiscountValue;
                }
                elseif ($type_discount->Type == 1) {
                    $price_item_famy[$price->StartElementId] = $tmp_value->DiscountValue;
                }
                elseif ($type_discount->Type == 2) {
                    $discount_item_famy[$price->StartElementId] = $tmp_value->DiscountValue;
                }
            }

            foreach ($items as $key =>$item ) {

                if (array_key_exists($item->Id,$hidden_item) || array_key_exists($item->FamilyId,$hidden_item) || array_key_exists($item->SubFamilyId,$hidden_item))
                    $items->forget($key);
                elseif (array_key_exists($item->Id,$price_item_client))
                    $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_client[$item->Id])/100);
                elseif (array_key_exists($item->FamilyId,$price_item_client))
                    $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_client[$item->FamilyId])/100);
                elseif (array_key_exists($item->SubFamilyId,$price_item_client))
                    $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_client[$item->SubFamilyId])/100);
                elseif (array_key_exists($item->Id,$price_item_famy))
                    $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_famy[$item->Id])/100);
                elseif (array_key_exists($item->FamilyId,$price_item_famy))
                    $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_famy[$item->FamilyId])/100);
                elseif (array_key_exists($item->SubFamilyId,$price_item_famy))
                    $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_famy[$item->SubFamilyId])/100);
            }
        }
        return $items;
    }

    private function getPriceOneitem($item)
    {
        $price_item_client = [];
        $price_item_famy = [];
        $hidden_item = [];
        if (!is_null( Auth::user()) && !is_null(Auth::user()->email_verified_at) && Auth::user()->compte_actif ==1) {
            $id_customer = Auth::user()->Contact->Customer->Id;
            $id_customer_family = Auth::user()->Contact->Customer->FamilyId;
            $prices_client = DB::connection('sqlsrv')->table('PriceListInclusionLine')->select('PriceListId','StartElementId')
            ->where('InclusionType','<>','128')
            ->where('InclusionType','<>','32')
            ->whereIn('PriceListId',function ($query) use ($id_customer) {
                $query->select('PriceListId')
                ->from('PriceListInclusionLine')
                ->where('StartElementId','=',$id_customer)
                ->where('inclusionType','128');
            })
            ->get();
            $prices_famy = DB::connection('sqlsrv')->table('PriceListInclusionLine')->select('PriceListId','StartElementId')
            ->where('InclusionType','<>','128')
            ->where('InclusionType','<>','32')
            ->whereIn('PriceListId',function ($query) use ($id_customer_family) {
                $query->select('PriceListId')
                ->from('PriceListInclusionLine')
                ->where('StartElementId', $id_customer_family)
                ->where('inclusionType', '=', '32');
            })
            ->get();

            foreach ($prices_client as $price) {
                $type_discount = DB::connection('sqlsrv')->table('PriceList')->select('Type')->where('Id',$price->PriceListId)->first();
                $tmp_value = DB::connection('sqlsrv')->table('PriceListCalculationLine')->select('DiscountValue')->where('PriceListId',$price->PriceListId)->first();
                if ($tmp_value->DiscountValue == -1 && $type_discount->Type == 1) {
                    $hidden_item[$price->StartElementId] = $tmp_value->DiscountValue;
                }
                elseif ($type_discount->Type == 1) {
                    $price_item_client[$price->StartElementId] = $tmp_value->DiscountValue;
                }
                elseif ($type_discount->Type == 2) {
                    $discount_item_client[$price->StartElementId] = $tmp_value->DiscountValue;
                }

            }
            foreach ($prices_famy as $price) {
                $type_discount = DB::connection('sqlsrv')->table('PriceList')->select('Type')->where('Id',$price->PriceListId)->first();
                $tmp_value = DB::connection('sqlsrv')->table('PriceListCalculationLine')->select('DiscountValue')->where('PriceListId',$price->PriceListId)->first();
                if ($tmp_value->DiscountValue == -1 && $type_discount->Type == 1) {
                    $hidden_item[$price->StartElementId] = $tmp_value->DiscountValue;
                }
                elseif ($type_discount->Type == 1) {
                    $price_item_famy[$price->StartElementId] = $tmp_value->DiscountValue;
                }
                elseif ($type_discount->Type == 2) {
                    $discount_item_famy[$price->StartElementId] = $tmp_value->DiscountValue;
                }
            }

            if (array_key_exists($item->Id,$price_item_client))
                $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_client[$item->Id])/100);
            elseif (array_key_exists($item->FamilyId,$price_item_client))
                $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_client[$item->FamilyId])/100);
            elseif (array_key_exists($item->SubFamilyId,$price_item_client))
                $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_client[$item->SubFamilyId])/100);
            elseif (array_key_exists($item->Id,$price_item_famy))
                $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_famy[$item->Id])/100);
            elseif (array_key_exists($item->FamilyId,$price_item_famy))
                $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_famy[$item->FamilyId])/100);
            elseif (array_key_exists($item->SubFamilyId,$price_item_famy))
                $item->SalePriceVatExcluded = $item->SalePriceVatExcluded*((100-$price_item_famy[$item->SubFamilyId])/100);
        }
        return $item;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Families = Family::all()->sortBy('MainIntervener')->groupBy('MainIntervener');
        // dd(Auth::guard('unconfirmed')->user());
        $items = Item::itemA()->paginate(20);

        if (!isset($_GET["stock"])) {
            if (!isset($_GET["trie"]) or $_GET["trie"] == "noTrie") {
                $items = $this->getPrice($items);
            }
            else if ($_GET["trie"] == 'PrixDecroissant') {

                $items = Item::itemNT()->orderBy('SalePriceVatExcluded')->paginate(20);

                $items = $this->getPrice($items);
            }else if ($_GET["trie"] == 'PrixCroissant') {
                $items = Item::itemNT()->orderBy('SalePriceVatExcluded','desc')->paginate(20);

                $items = $this->getPrice($items);
            }
        }else {
            if (!isset($_GET["trie"]) or $_GET["trie"] == "noTrie") {
                $items = Item::itemA()->where('RealStock','>','0')->paginate(20);
                $items = $this->getPrice($items);
            }
            else if ($_GET["trie"] == 'PrixDecroissant') {
                $items = Item::itemNT()->where('RealStock','>','0')->orderBy('SalePriceVatExcluded')->paginate(20);
                $items = $this->getPrice($items);
            }else if ($_GET["trie"] == 'PrixCroissant') {
                $items = Item::itemNT()->where('RealStock','>','0')->orderBy('SalePriceVatExcluded','desc')->paginate(20);
                $items = $this->getPrice($items);
            }
        }
        return view('product.home', compact('items', 'Families'));
    }

    
        
    public function home(){
        $Families = Family::all()->sortBy('MainIntervener')->groupBy('MainIntervener');
        $news = Item::itemNT()->orderByDesc('sysCreatedDate')->limit(5)->get();
        $promotions = Item::itemA()->inRandomOrder()->limit(10)->get();
        $bestsell=SaleDocumentLine::select('ItemId')->whereNotNull('ItemId')->groupBy('ItemId')->orderByRaw('count(*) DESC')->limit(5)->get();
         return view('product.index' ,compact('Families','news','promotions','bestsell'));
    }

    public function show($id)
    {
        $item = Item::itemA()->find($id);
        if(Auth::check()){
       $item = $this->getPriceOneitem($item); }
        if (is_null($item)) {
            return redirect()
                ->route('product.home')
                ->with('error','le produit auquel vous essayer d\'accèder n\'existe pas ou n\'est pas disponible à la vente');
        }
        return view('product.show', compact('item'));
    }

    public function email(){
        Mail::to('mhwalid7@gmail.com')->send(new OrderMail('OrderMail'));
        return "walid";
    }

    public function itembyCaption($Id)
    {
        $marques = Db::connection('mysql')->table('main_carac')->select('marque')->distinct()->where('family', $Id)->get();
        $memoire= Db::connection('mysql')->table('main_carac')->select('memoire')->distinct()->where('family', $Id)->get();
        $taille_ecran= Db::connection('mysql')->table('main_carac')->select('taille_ecran')->distinct()->where('family', $Id)->get();
        $ssd= Db::connection('mysql')->table('main_carac')->select('ssd')->distinct()->where('family', $Id)->get();
        $os= Db::connection('mysql')->table('main_carac')->select('os')->distinct()->where('family', $Id)->get();
        $chipset= Db::connection('mysql')->table('main_carac')->select('chipset')->distinct()->where('family', $Id)->get();
        $fam_proc= Db::connection('mysql')->table('main_carac')->select('fam_proc')->distinct()->where('family', $Id)->get();
        $sock_proc= Db::connection('mysql')->table('main_carac')->select('sock_proc')->distinct()->where('family', $Id)->get();
        $gpu= Db::connection('mysql')->table('main_carac')->select('gpu')->distinct()->where('family', $Id)->get();
        $puissance= Db::connection('mysql')->table('main_carac')->select('puissance')->distinct()->where('family', $Id)->get();
        $frequ_mem= Db::connection('mysql')->table('main_carac')->select('frequ_memoire')->distinct()->where('family', $Id)->get();
        $nb_barrette= Db::connection('mysql')->table('main_carac')->select('nb_barrette')->distinct()->where('family', $Id)->get();
        $Families = Family::all()->sortBy('MainIntervener')->groupBy('MainIntervener');
        $items = Item::itemA()->where('FamilyId', $Id)->paginate(20);
        
        if (!isset($_GET["stock"])) {
            if (!isset($_GET["trie"]) or $_GET["trie"] == "noTrie") {
                $items = Item::itemA()->where('FamilyId', $Id)->paginate(20);
            }
            else if ($_GET["trie"] == 'PrixDecroissant') {
                $items = Item::itemNT()->where('FamilyId', $Id)->orderBy('SalePriceVatExcluded')->paginate(20);

                $items = $this->getPrice($items);
            }else if ($_GET["trie"] == 'PrixCroissant') {
                $items = Item::itemNT()->where('FamilyId', $Id)->orderBy('SalePriceVatExcluded','desc')->paginate(20);

                $items = $this->getPrice($items);

            }
        }else {
            if (!isset($_GET["trie"]) or $_GET["trie"] == "noTrie") {
                $items = Item::itemA()->where('RealStock','>','0')->where('FamilyId', $Id)->paginate(20);
            }
            else if ($_GET["trie"] == 'PrixDecroissant') {
                $items = Item::itemNT()->where('RealStock','>','0')->where('FamilyId', $Id)->orderBy('SalePriceVatExcluded')->paginate(20);

                $items = $this->getPrice($items);
            }else if ($_GET["trie"] == 'PrixCroissant') {
                $items = Item::itemNT()->where('RealStock','>','0')->where('FamilyId', $Id)->orderBy('SalePriceVatExcluded','desc')->paginate(20);

                $items = $this->getPrice($items);
            }
        }
        $items = $this->getPrice($items);
        $checked="";
        return view('product.home', compact('items', 'checked','Families','marques','memoire','taille_ecran','ssd','os','chipset','fam_proc','sock_proc','gpu','puissance','frequ_mem','nb_barrette'));
    }
    public function contact()
    {
        return view('product.contact');
    }

    public function payement()
    {
        return view('product.payement');
    }
    public function qui()
    {
        return view('product.qui');
    }
    public function kw()
    {
        return view('product.kw');
    }
    public function certification()
    {
        return view('product.certification');
    }
    public function mail()
    {
        return view('product.mail');
    }

    public function search(Request $request)
    {
        $q = $request->value;
        $url = $request->ur;
        $pieces = explode("/", $url);

        if (count($pieces) == 1) {
            $items = Item::itemA()->where(function($query) use ($q) {
                $query->where('Caption', 'like', "%$q%")
                ->orWhere('BarCode ','like' ,"%$q%");
            })->paginate(100);
            $items = $this->getPrice($items);
            return $items;
        } else {
           if ($pieces[1] == "Family") {
                $con = $pieces[2];
                $items = Item::itemA()
                ->where('FamilyId',$con)
                ->where(function($query) use ($q) {
                    $query->where('Caption', 'like', "%$q%")
                    ->orWhere('BarCode ','like' ,"%$q%");
                })->paginate(100);
                $items = $this->getPrice($items);

                return $items;
                // $dz = "fam";
            }
        }
    }


    public function filters(Request $rq){
        $Id=$rq->FamilyId;
        $marques = Db::connection('mysql')->table('main_carac')->select('marque')->distinct()->where('family', $Id)->get();
        $memoire= Db::connection('mysql')->table('main_carac')->select('memoire')->distinct()->where('family', $Id)->get();
        $taille_ecran= Db::connection('mysql')->table('main_carac')->select('taille_ecran')->distinct()->where('family', $Id)->get();
        $ssd= Db::connection('mysql')->table('main_carac')->select('ssd')->distinct()->where('family', $Id)->get();
        $os= Db::connection('mysql')->table('main_carac')->select('os')->distinct()->where('family', $Id)->get();
        $chipset= Db::connection('mysql')->table('main_carac')->select('chipset')->distinct()->where('family', $Id)->get();
        $fam_proc= Db::connection('mysql')->table('main_carac')->select('fam_proc')->distinct()->where('family', $Id)->get();
        $sock_proc= Db::connection('mysql')->table('main_carac')->select('sock_proc')->distinct()->where('family', $Id)->get();
        $gpu= Db::connection('mysql')->table('main_carac')->select('gpu')->distinct()->where('family', $Id)->get();
        $puissance= Db::connection('mysql')->table('main_carac')->select('puissance')->distinct()->where('family', $Id)->get();
        $frequ_mem= Db::connection('mysql')->table('main_carac')->select('frequ_memoire')->distinct()->where('family', $Id)->get();
        $nb_barrette= Db::connection('mysql')->table('main_carac')->select('nb_barrette')->distinct()->where('family', $Id)->get();
        $Families = Family::all()->groupBy('MainIntervener');
        $fmarques = $rq->marque;
        $fmemoire = $rq->memoire;
        $ftaille_ecran = $rq->taille_ecran;  
        $fssd = $rq->ssd;  
        $fos = $rq->os;  
        $ffam_proc = $rq->fam_proc;  
        $fsock_proc = $rq->sock_proc;  
        $fgpu = $rq->gpu;  
        $fchipset = $rq->chipset;  
        $fpuissance = $rq->puissance;  
        $ffrequ_mem = $rq->frequ_mem;  
        $fnb_barrette = $rq->nb_barrette;
        $url= (explode('/', $rq->url)); 
        $MainCarac = DB::Table('main_carac')->where('family', $Id);
        $checked="";
        // return dd($rq->all());
        $i=0;
        foreach($rq->all() as $index){
           
            
            // if($i >=5){
                if(is_array($index) || is_object($index)){
                    foreach($index as $value){
                        $checked.= $value.";";
                        // return dd($index);
                    }
                   }else{
                    $checked.= $index.";";
                   }
            //   }
            //   $i++;
              
         }
        // return $test = DB::Table('main_carac')->select('id_item')->where('marque','ASUS')->orwhere('marque','msi')->get();
        if(isset($rq->marque)){
                $MainCarac->where(function ($query) use ($fmarques){
                    foreach($fmarques as $index =>$mar){
                         if($index ==0){
                            $query->where('marque',$mar);
                           }else{
                            $query->orwhere('marque',$mar);
                           }
                    }
                    return  $query;
             });
        }
        if(isset($rq->memoire)){
            $MainCarac->where(function ($query) use ($fmemoire){
                foreach($fmemoire as $index =>$mem){
                     if($index ==0){
                        $query->where('memoire',$mem);
                       }else{
                        $query->orwhere('memoire',$mem);
                       }
                }
                return  $query;
            });
        }
        if(isset($rq->taille_ecran)){
            $MainCarac->where(function ($query) use ($ftaille_ecran){
                foreach($ftaille_ecran as $index =>$value){
                     if($index ==0){
                        $query->where('taille_ecran',$value);
                       }else{
                        $query->orwhere('taille_ecran',$value);
                       }
                }
                return  $query;
            });
        }
        if(isset($rq->ssd)){
            $MainCarac->where(function ($query) use ($fssd){
                foreach($fssd as $index =>$value){
                     if($index ==0){
                        $query->where('ssd',$value);
                       }else{
                        $query->orwhere('ssd',$value);
                       }
                }
                return  $query;
            });
        }
        if(isset($rq->os)){
            $MainCarac->where(function ($query) use ($fos){
                foreach($fos as $index =>$value){
                     if($index ==0){
                        $query->where('os',$value);
                       }else{
                        $query->orwhere('os',$value);
                       }
                }
                return  $query;
            });
        }
        if(isset($rq->fam_proc)){
            $MainCarac->where(function ($query) use ($ffam_proc){
                foreach($ffam_proc as $index =>$value){
                     if($index ==0){
                        $query->where('fam_proc',$value);
                       }else{
                        $query->orwhere('fam_proc',$value);
                       }
                }
                return  $query;
            });
        }    
        if(isset($rq->sock_proc)){
            $MainCarac->where(function ($query) use ($fsock_proc){
                foreach($fsock_proc as $index =>$value){
                     if($index ==0){
                        $query->where('sock_proc',$value);
                       }else{
                        $query->orwhere('sock_proc',$value);
                       }
                }
                return  $query;
            });
        }    
        if(isset($rq->gpu)){
            $MainCarac->where(function ($query) use ($fgpu){
                foreach($fgpu as $index =>$value){
                     if($index ==0){
                        $query->where('gpu',$value);
                       }else{
                        $query->orwhere('gpu',$value);
                       }
                }
                return  $query;
            });
        }    
        if(isset($rq->chipset)){
            $MainCarac->where(function ($query) use ($fchipset){
                foreach($fchipset as $index =>$value){
                     if($index ==0){
                        $query->where('chipset',$value);
                       }else{
                        $query->orwhere('chipset',$value);
                       }
                }
                return  $query;
            });
        }    
        if(isset($rq->puissance)){
            $MainCarac->where(function ($query) use ($fpuissance){
                foreach($fpuissance as $index =>$value){
                     if($index ==0){
                        $query->where('puissance',$value);
                       }else{
                        $query->orwhere('puissance',$value);
                       }
                }
                return  $query;
            });
        }    
        if(isset($rq->frequ_mem)){
            $MainCarac->where(function ($query) use ($ffrequ_mem){
                foreach($ffrequ_mem as $index =>$value){
                     if($index ==0){
                        $query->where('frequ_memoire',$value);
                       }else{
                        $query->orwhere('frequ_memoire',$value);
                       }
                }
                return  $query;
            });
        }    
        if(isset($rq->nb_barrette)){
            $MainCarac->where(function ($query) use ($fnb_barrette){
                foreach($fnb_barrette as $index =>$value){
                     if($index ==0){
                        $query->where('nb_barrette',$value);
                       }else{
                        $query->orwhere('nb_barrette',$value);
                       }
                }
                return  $query;
            });
        }     
        $MainCarac= $MainCarac->pluck('id_item');
        $items= Item::itemA()->whereIn('Id', $MainCarac)->paginate(20);
        return view('product.home', compact('items','checked', 'Families','marques','memoire','taille_ecran','ssd','os','chipset','fam_proc','sock_proc','gpu','puissance','frequ_mem','nb_barrette'));
    }
    public function feature($id){
        $item = Item::find($id);
        $arrivage = Db::connection('sqlsrv')->table('PurchaseDocumentLine')->select('PurchaseDocumentLine.Quantity', 'PurchaseDocumentLine.DeliveryDate', 'item.Id')->join('item', 'item.Id', '=', 'PurchaseDocumentLine.ItemId')->where('item.Id', $id)->whereRaw('DeliveryDate > SYSDATETIME()')->first();
        $data = [
            'item' => $item,
            'arrivage' => $arrivage,
        ];
        $pdf = PDF::loadView('product.itempdf', $data);
        return $pdf->stream($id.'.pdf');
    }

}

