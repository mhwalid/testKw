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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Families = Family::all()->sortBy('MainIntervener')->groupBy('MainIntervener');
        $items = Item::itemA()->paginate(20);
        $id_customer = '';
        if (!is_null( Auth::user())) {
            $id_customer = Auth::user()->Contact->Customer->Id;
            $id_customer_family = Auth::user()->Contact->Customer->FamilyId;
            $prices = DB::connection('sqlsrv')->table('PriceListInclusionLine')->select('PriceListId','StartElementId')
            ->where('InclusionType','<>','128')
            ->where('InclusionType','<>','32')
            ->whereIn('PriceListId',function ($query) {
                $query->select('PriceListId')
                ->from('PriceListInclusionLine')
                ->where('StartElementId','=','INF009')
                ->where('inclusionType','128')
                ->orWhere(function($query) {
                    $query->where('StartElementId', '004')
                          ->where('inclusionType', '=', '32');
                });
            })
            ->get();

            foreach ($prices as $price) {
                $tmp_value = DB::connection('sqlsrv')->table('PriceListCalculationLine')->select('DiscountValue')->where('PriceListId',$price->PriceListId)->first();

                print_r($tmp_value->DiscountValue);
            }


        }

        return view('product.home', compact('items', 'Families'));
    }
     public function home(){
        $Families = Family::all()->groupBy('MainIntervener');
        
         return view('product.index' ,compact('Families'));
     }

    public function show($id)
    {

        $item = Item::itemA()->find($id);
       return view('product.show', compact('item'));
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
        $Families = Family::all()->groupBy('MainIntervener');
        $items  = Item::itemA()->where('FamilyId', $Id)->paginate(20);
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


    public function search(Request $request)
    {
        $q = $request->value;
        $url = $request->ur;
        $pieces = explode("/", $url);

        if (count($pieces) == 1) {
            $items = Item::itemA()->where('Caption', 'like', "%$q%")->orWhere('BarCode ','like' ,"%$q%")->paginate(100);
            return $items;
        } else {
           if ($pieces[1] == "Family") {
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
        $fmarques = $rq->marques;
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
            $i++;
            if($i >=5){
                if(is_array($index) || is_object($index)){
                    foreach($index as $value){
                        $checked.= $value.";";
                    }
                   }else{
                    $checked.= $index.";";
                   }
              }
       }
        // return $test = DB::Table('main_carac')->select('id_item')->where('marque','ASUS')->orwhere('marque','msi')->get();
        if(isset($rq->marques)){
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
                foreach($fmemoire as $index =>$value){
                     if($index ==0){
                        $query->where('memoire',$value);
                       }else{
                        $fmemoire->orwhere('memoire',$value);
                       }
                }
                return  $query;
            });
        }

        if(isset($rq->memoire)){
            $MainCarac->where(function ($query) use ($fmemoire){
                foreach($fmemoire as $index =>$value){
                     if($index ==0){
                        $query->where('memoire',$value);
                       }else{
                        $fmemoire->orwhere('memoire',$value);
                       }
                }
                return  $query;
            });
        }
        if(isset($rq->memoire)){
            $MainCarac->where(function ($query) use ($fmemoire){
                foreach($fmemoire as $index =>$value){
                     if($index ==0){
                        $query->where('memoire',$value);
                       }else{
                        $fmemoire->orwhere('memoire',$value);
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
