<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Item;
use App\Models\SubFamily;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Location;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF;
use Dompdf\Options;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Families = Family::with('subFamily')->get();
        $items = Item::itemA()->paginate(20);
        return view('product.home', compact('items', 'Families'));
    }

    public function show($id)
    {
         $item = Item::find($id);
        $arrivage = Db::connection('sqlsrv')->table('PurchaseDocumentLine')->select('PurchaseDocumentLine.Quantity', 'PurchaseDocumentLine.DeliveryDate', 'item.Id')->join('item', 'item.Id', '=', 'PurchaseDocumentLine.ItemId')->where('item.Id', $id)->whereRaw('DeliveryDate > SYSDATETIME()')->first();
       return view('product.show', compact('item', 'arrivage'));
    }


    public function itembyCaption($Id)
    {
        $data = [];
        $Families = Family::with('subFamily')->get();
        $items  = Item::itemA()->where('FamilyId', $Id)->paginate(20);;
        return view('product.home', compact('items', 'Families'));
    }
    public function itembysubFamily($Id)
    {
        $Families = Family::with('subFamily')->get();
        $items  = Item::itemA()->where('SubFamilyId', $Id)->paginate(20);
        return view('product.home', compact('items', 'Families'));
        // return response()->json($items);
    }



    public function search(Request $request)
    {
        $q = $request->value;
        $url = $request->ur;
        $pieces = explode("/", $url);

        if (count($pieces) == 1) {
            $items = Item::itemA()->where('Caption', 'like', "%$q%")->orWhere('BarCode ','like' ,"%$q%")->paginate(100);
            return $items;
        } else {
            if ($pieces[1] == "SubFamily") {
                $con = $pieces[2];
                $items = Item::itemA()->where('Caption', 'like', "%$q%")
                    ->where('SubFamilyId', 'like', "%$con%")
                    ->orWhere('BarCode ','like' ,"%$q%")
                    ->paginate(180);
                    return $items;
                // $dz = "sub";
            } elseif ($pieces[1] == "Family") {
                $con = $pieces[2];
                $items = Item::itemA()->where('Caption', 'like', "%$q%")
                    ->where('FamilyId', 'like', "%$con%")
                    ->orWhere('BarCode ','like' ,"%$q%")
                    ->paginate(170);
                    return $items;
                // $dz = "fam";
            }
        }

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
        // require_once 'dompdf/autoload.inc.php';
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
        $pdf = PDF::loadView('product.itempdf', $data)->setOptions(['defaultFont' => 'sans-serif'], ['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true] );

        return $pdf->stream($id.'.pdf');
        // return view('product.itempdf', compact('item', 'arrivage'));
    }
}
