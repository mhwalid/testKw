<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Family;
use App\Models\Item;
use App\Models\MainCarac;
use App\Models\SubFamily;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;


class ItemController extends Controller
{
    private function getPrice($items)
    {
        $price_item_client = [];
        $price_item_famy = [];
        $hidden_item = [];
        if (!is_null( Auth::user())) {
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

            foreach ($items as $key =>$item ) {

                if (array_key_exists($item->Id,$hidden_item) || array_key_exists($item->FamilyId,$hidden_item) || array_key_exists($item->SubFamilyId,$hidden_item))
                    $items->forget($key);
                elseif (array_key_exists($item->Id,$price_item_client))
                    $item->CostPrice = $item->CostPrice*((100-$price_item_client[$item->Id])/100);
                elseif (array_key_exists($item->FamilyId,$price_item_client))
                    $item->CostPrice = $item->CostPrice*((100-$price_item_client[$item->FamilyId])/100);
                elseif (array_key_exists($item->SubFamilyId,$price_item_client))
                    $item->CostPrice = $item->CostPrice*((100-$price_item_client[$item->SubFamilyId])/100);
                elseif (array_key_exists($item->Id,$price_item_famy))
                    $item->CostPrice = $item->CostPrice*((100-$price_item_famy[$item->Id])/100);
                elseif (array_key_exists($item->FamilyId,$price_item_famy))
                    $item->CostPrice = $item->CostPrice*((100-$price_item_famy[$item->FamilyId])/100);
                elseif (array_key_exists($item->SubFamilyId,$price_item_famy))
                    $item->CostPrice = $item->CostPrice*((100-$price_item_famy[$item->SubFamilyId])/100);
            }
        }
        return $items;
    }

    private function getPriceOneitem($item)
    {
        $price_item_client = [];
        $price_item_famy = [];
        $hidden_item = [];
        if (!is_null( Auth::user())) {
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
                $item->CostPrice = $item->CostPrice*((100-$price_item_client[$item->Id])/100);
            elseif (array_key_exists($item->FamilyId,$price_item_client))
                $item->CostPrice = $item->CostPrice*((100-$price_item_client[$item->FamilyId])/100);
            elseif (array_key_exists($item->SubFamilyId,$price_item_client))
                $item->CostPrice = $item->CostPrice*((100-$price_item_client[$item->SubFamilyId])/100);
            elseif (array_key_exists($item->Id,$price_item_famy))
                $item->CostPrice = $item->CostPrice*((100-$price_item_famy[$item->Id])/100);
            elseif (array_key_exists($item->FamilyId,$price_item_famy))
                $item->CostPrice = $item->CostPrice*((100-$price_item_famy[$item->FamilyId])/100);
            elseif (array_key_exists($item->SubFamilyId,$price_item_famy))
                $item->CostPrice = $item->CostPrice*((100-$price_item_famy[$item->SubFamilyId])/100);

            return $item;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Families = Family::all()->sortBy('MainIntervener')->groupBy('MainIntervener');
        $items = Item::itemA()->paginate(20);

        $items = $this->getPrice($items);

        return view('product.home', compact('items', 'Families'));
    }

    public function trie()
    {
        $trie = $_POST["trie"];

        $Families = Family::all()->sortBy('MainIntervener')->groupBy('MainIntervener');
        if ($trie == 'noTrie') {
            return $this->index();
        }else {
            if ($trie == 'PrixDecroissant') {
                $items = Item::itemA()->orderBy('CostPrice')->paginate(20);

                $items = $this->getPrice($items);
                return view('product.home', compact('items', 'Families'));
            }elseif ($trie == 'PrixCroissant') {
                $items = Item::itemA()->orderBy('CostPrice','desc')->paginate(20);

                $items = $this->getPrice($items);
                return view('product.home', compact('items', 'Families'));
            }
        }
    }

    // public function stock()
    // {

    //     $Families = Family::all()->sortBy('MainIntervener')->groupBy('MainIntervener');
    //     $items = Item::itemA()->where('RealStock','>',0)->paginate(20);
    //     $items = $this->getPrice($items);

    //     return view('product.showsAll', compact('items', 'Families'));
    // }

    // public function noStock()
    // {

    //     $Families = Family::all()->sortBy('MainIntervener')->groupBy('MainIntervener');
    //     $items = Item::itemA()->paginate(20);
    //     $items = $this->getPrice($items);

    //     return view('product.showsAll', compact('items', 'Families'));
    // }

    public function home(){
        $Families = Family::all()->groupBy('MainIntervener');
        return view('product.index' ,compact('Families'));
    }

    public function show($id)
    {

        $item = Item::itemA()->find($id);
        $item = $this->getPriceOneitem($item);
        return view('product.show', compact('item'));
    }


    public function itembyCaption($Id)
    {

        $marques = Db::connection('mysql')->table('main_carac')
        ->select('marque')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $memoire= Db::connection('mysql')->table('main_carac')
        ->select('memoire')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $taille_ecran= Db::connection('mysql')->table('main_carac')
        ->select('taille_ecran')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $ssd= Db::connection('mysql')->table('main_carac')
        ->select('ssd')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $os= Db::connection('mysql')->table('main_carac')
        ->select('os')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $chipset= Db::connection('mysql')->table('main_carac')
        ->select('chipset')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $fam_proc= Db::connection('mysql')->table('main_carac')
        ->select('fam_proc')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $sock_proc= Db::connection('mysql')->table('main_carac')
        ->select('sock_proc')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $gpu= Db::connection('mysql')->table('main_carac')
        ->select('gpu')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $puissance= Db::connection('mysql')->table('main_carac')
        ->select('puissance')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $frequ_mem= Db::connection('mysql')->table('main_carac')
        ->select('frequ_memoire')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $nb_barrette= Db::connection('mysql')->table('main_carac')
        ->select('nb_barrette')
        ->distinct()
        ->where('family', $Id)
        ->get();

        $Families = Family::all()->groupBy('MainIntervener');
        $items  = Item::itemA()->where('FamilyId', $Id)->paginate(20);;

        $items = $this->getPrice($items);


        // dd($items);
        return view('product.home', compact('items', 'Families','marques','memoire','taille_ecran','ssd','os','chipset','fam_proc','sock_proc','gpu','puissance','frequ_mem','nb_barrette'));

    }
    public function itembysubFamily($Id)
    {
        $Families = Family::all()->groupBy('MainIntervener');
        $items  = Item::itemA()->where('SubFamilyId', $Id)->paginate(20);
        $items = $this->getPrice($items);;

        return view('product.home', compact('items', 'Families'));
        // return response()->json($items);
    }

    public function contact()
    {
        return view('product.contact');
    }
    public function payement()
    {
        return view('product.payement');
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

        $items=Item::itemA();
        if($rq->marque_id) $items->where('');

        return $rq;
    }


    public function filter(Request $request)
    {
        $ram = $request->ram;
        $v = $request->value;
        $url = $request->url;
        $pieces = explode("/", $url);



        //  pour filter par capacite
        // if(count($pieces)==1){
        //         $items = DB::table('Item');

        //         if(isset($request->ram)){

        //             if(count($request->ram)==1){
        //                 $q=$request->ram[0];
        //                 $items =  $items->where('xx_categorie1',$q);

        //             }
        //             if(count($request->ram)==2){
        //                 $q=$request->ram[0];
        //                 $q1=$request->ram[1];
        //                 $items =  $items->where('xx_categorie1',$q)
        //                                     ->orWhere('xx_categorie1',$q1)
        //                                         ;
        //             }
        //             if(count($request->ram)==3){
        //                 $q=$request->ram[0];
        //                 $q1=$request->ram[1];
        //                 $q2=$request->ram[2];
        //                 $items =   $items->where('xx_categorie1', $q)
        //                                                 ->orWhere('xx_categorie1',$q1)
        //                                                 ->orWhere('xx_categorie1',$q2);

        //             }
        //         }
        //         if(isset($request->proc)){
        //             if(count($request->Stockage)==1){
        //                 $q=$request->Stockage[0];
        //                 $items =  $items->where('xx_categorie2',$q);

        //             }
        //             if(count($request->Stockage)==2){
        //                 $q=$request->Stockage[0];
        //                  $q1=$request->Stockage[1];
        //                  $items =  $items->where('xx_categorie2',$q)
        //                                     ->orWhere('xx_categorie2',$q1);
        //             }
        //             if(count($request->Stockage)==3){
        //                 $q=$request->Stockage[0];
        //                 $q1=$request->Stockage[1];
        //                 $q2=$request->Stockage[2];
        //                 $items =   $items->where('xx_categorie2',$q)
        //                                                 ->orWhere('xx_categorie2',$q1)
        //                                                 ->orWhere('xx_categorie2',$q2);
        //             }
        //          }
        //         if(isset($request->proc)){
        //             if(count($request->proc)==1){
        //                 $q=$request->proc[0];
        //                 $items =  $items->where('localizableCaption_2',$q);

        //             }
        //             if(count($request->proc)==2){
        //                 $q=$request->proc[0];
        //                  $q1=$request->proc[1];
        //                  $items =  $items->where('localizableCaption_2',$q)
        //                                     ->orWhere('localizableCaption_2',$q);
        //             }
        //             if(count($request->proc)==3){
        //                 $q=$request->proc[0];
        //                 $q1=$request->proc[1];
        //                 $q2=$request->proc[2];
        //                 $items =   $items->where('localizableCaption_2',$q)
        //                                                 ->orWhere('localizableCaption_2',$q)
        //                                                 ->orWhere('localizableCaption_2',$q);
        //             }
        //          }

        //     return $items->paginate(300);

        // }else
        // {

        if ($request->ram || $request->Stockage || $request->proc || $request->disque || $request->mrq || $request->CGType || $request->size) {
            if ($pieces[1] == "SubFamily") {
                $con = $pieces[2];
                $items = Item::itemA()->where('SubFamilyId', 'like', "%$con%");
                if (isset($request->ram)) {
                    if (count($request->ram) == 1) {
                        $q = $request->ram[0];
                        $items =  $items->where('xx_categorie1', $q);
                    }
                    if (count($request->ram) == 2) {
                        $q = $request->ram[0];
                        $q1 = $request->ram[1];
                        $items =  $items->where('xx_categorie1', $q)
                            ->orWhere('xx_categorie1', $q1);
                    }
                    if (count($request->ram) == 3) {
                        $q = $request->ram[0];
                        $q1 = $request->ram[1];
                        $q2 = $request->ram[2];
                        $items =   $items->where('xx_categorie1', $q)
                            ->orWhere('xx_categorie1', $q1)
                            ->orWhere('xx_categorie1', $q2);
                    }
                }
                if (isset($request->Stockage)) {

                    if (count($request->Stockage) == 1) {
                        $q = $request->Stockage[0];
                        $items =  $items->where('xx_categorie2', $q);
                    }
                    if (count($request->Stockage) == 2) {
                        $q = $request->Stockage[0];
                        $q1 = $request->Stockage[1];
                        $items =  $items->where('xx_categorie2', $q)
                            ->orWhere('xx_categorie2', $q1);
                    }
                    if (count($request->Stockage) == 3) {
                        $q = $request->Stockage[0];
                        $q1 = $request->Stockage[1];
                        $q2 = $request->Stockage[2];
                        $items =   $items->where('xx_categorie2', $q)
                            ->orWhere('xx_categorie2', $q1)
                            ->orWhere('xx_categorie2', $q2);
                    }
                }

                if (isset($request->proc)) {
                    if (count($request->proc) == 1) {
                        $q = $request->proc[0];
                        $items =  $items->where('localizableCaption_2', $q);
                    }
                    if (count($request->proc) == 2) {
                        $q = $request->proc[0];
                        $q1 = $request->proc[1];
                        $items =  $items->where('localizableCaption_2', $q)
                            ->orWhere('localizableCaption_2', $q1);
                    }
                    if (count($request->proc) == 3) {
                        $q = $request->proc[0];
                        $q1 = $request->proc[1];
                        $q2 = $request->proc[2];
                        $items =   $items->where('localizableCaption_2', $q)
                            ->orWhere('localizableCaption_2', $q1)
                            ->orWhere('localizableCaption_2', $q2);
                    }
                }
                if (count($request->disque) > 0) {
                    $q = $request->disque[0];
                    $items =  $items->where('xx_categorie3', 'like', $q);
                }
                if (count($request->CGType) > 0) {
                    $q = $request->CGType[0];
                    $items =  $items->where('localizableCaption_3', 'like', $q);
                }

                return $items->paginate(390);
            } elseif ($pieces[1] == "Family") {
                $con = $pieces[2];
                $items = Item::itemA()
                    ->where('FamilyId', 'like', "%$con%");
                if (isset($request->ram)) {
                    if (count($request->ram) == 0) {
                        $items = Item::itemA()->where('FamilyId', 'like', "%$con%");
                    }
                    if (count($request->ram) == 1) {
                        $q = $request->ram[0];
                        $items =  $items->where('xx_categorie1', $q);
                    }
                    if (count($request->ram) == 2) {
                        $q = $request->ram[0];
                        $q1 = $request->ram[1];
                        $items =  $items->where('xx_categorie1', $q)
                            ->orWhere('xx_categorie1', $q1);
                    }
                    if (count($request->ram) == 3) {
                        $q = $request->ram[0];
                        $q1 = $request->ram[1];
                        $q2 = $request->ram[2];
                        $items =   $items->where('xx_categorie1', $q)
                            ->orWhere('xx_categorie1', $q1)
                            ->orWhere('xx_categorie1', $q2);
                    }
                }
                if (isset($request->Stockage)) {
                    if (count($request->Stockage) == 1) {
                        $q = $request->Stockage[0];
                        $items =  $items->where('xx_categorie2', $q);
                    }
                    if (count($request->Stockage) == 2) {
                        $q = $request->Stockage[0];
                        $q1 = $request->Stockage[1];
                        $items =  $items->where('xx_categorie2', $q)
                            ->orWhere('xx_categorie2', $q1);
                    }
                    if (count($request->Stockage) == 3) {
                        $q = $request->Stockage[0];
                        $q1 = $request->Stockage[1];
                        $q2 = $request->Stockage[2];
                        $items =   $items->where('xx_categorie2', $q)
                            ->orWhere('xx_categorie2', $q1)
                            ->orWhere('xx_categorie2', $q2);
                    }
                }
                if (isset($request->proc)) {
                    if (count($request->proc) == 1) {
                        $q = $request->proc[0];
                        $items =  $items->where('localizableCaption_2', $q);
                    }
                    if (count($request->proc) == 2) {
                        $q = $request->proc[0];
                        $q1 = $request->proc[1];
                        $items =  $items->where('localizableCaption_2', $q)
                            ->orWhere('localizableCaption_2', $q);
                    }
                    if (count($request->proc) == 3) {
                        $q = $request->proc[0];
                        $q1 = $request->proc[1];
                        $q2 = $request->proc[2];
                        $items =   $items->where('localizableCaption_2', $q)
                            ->orWhere('localizableCaption_2', $q)
                            ->orWhere('localizableCaption_2', $q);
                    }
                }
                if (count($request->disque) > 0) {
                    $q = $request->disque[0];
                    $items =  $items->where('xx_categorie3', 'like', $q);
                }
                if (count($request->mrq) > 0) {
                    $q = $request->mrq[0];
                    $items =  $items->where('SubFamilyId', 'like', "%$q%");
                }
                if (count($request->CGType) > 0) {
                    $q = $request->CGType[0];
                    $items =  $items->where('localizableCaption_3', 'like', $q);
                }
                if (count($request->size) > 0) {
                    $q = $request->size[0];
                    $items =  $items->where('localizableCaption_4', 'like', $q);
                }



                return $items->paginate(208);
            }
        }
    }


    //     if(isset($_POST["action"]))
    // {
    // $query = "
    // SELECT * FROM product WHERE product_status = '1'
    // ";
    // if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    // {
    // $query .= "
    // AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
    // ";
    // }
    // if(isset($_POST["brand"]))
    // {
    // $brand_filter = implode("','", $_POST["brand"]);
    // $query .= "
    // AND product_brand IN('".$brand_filter."')
    // ";
    // }
    // if(isset($_POST["ram"]))
    // {
    // $ram_filter = implode("','", $_POST["ram"]);
    // $query .= "
    // AND product_ram IN('".$ram_filter."')
    // ";
    // }
    // if(isset($_POST["storage"]))
    // {
    // $storage_filter = implode("','", $_POST["storage"]);
    // $query .= "
    // AND product_storage IN('".$storage_filter."')
    // ";
    // }

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
