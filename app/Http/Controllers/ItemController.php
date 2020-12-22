<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Item;
use App\Models\SubFamily;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
         $items = Item::orderBy("sysCreatedDate",'desc')->paginate(20);
        //dd($Families->Id);
        return view('product.home', compact('items','Families'));
         return response()->json(['items'=>$items , 'Families'=>$Families ]);
    }

    public function show($id)
    {
        $item = Item::where('Id',$id)->first();

        return view('product.show')->with('item',$item);
    }


        public function itembyCaption($Id){
            $data=[];
             $Families = Family::with('subFamily')->get();
             $items  = Item::where('FamilyId', $Id)->paginate(20);;
            return view('product.home',compact('items','Families'));
        }
        public function itembysubFamily($Id){

            $Families = Family::with('subFamily')->get();
            $items  = Item::where('SubFamilyId', $Id)->paginate(20);
            return view('product.home',compact('items','Families'));
            return response()->json($items);
        }

       
     
       public function search(Request $request) {
        $q = $request->value;
        $url = $request->ur;
        $pieces = explode("/", $url);
        $wad='s';
        if($q==''){
            $items = DB::table('Item')->paginate(20);
        }
        if(count($pieces)==1){
            $items = DB::table('Item')->where('Caption', 'like',"%$q%" )->paginate(20);
        }else{
            if($pieces[1]=="SubFamily"){
                $con=$pieces[2];
             $items = DB::table('Item')->where('Caption', 'like',"%$q%" )
                                          ->where('SubFamilyId', 'like',"%$con%" )
                                          ->paginate(20);
                                          $dz="sub";
    
            }elseif($pieces[1]=="Family"){
                    $con=$pieces[2];
                    $items = DB::table('Item')->where('Caption', 'like',"%$q%" )
                    ->where('FamilyId', 'like',"%$con%" )
                    ->paginate(20);
                    $dz="fam";
                }
        }

      
        return $items;

    }
       
       
        public function searc($Id ,$Idf){
          
            var_dump($Id);
            var_dump($Idf);
          
            $Families = Family::with('subFamily')->get();
            $q= request()->input('q');
            $items  = Item::where('Caption', 'like',"%$q%" )
                     ->orwhere('Caption', 'like',"%$q%" ) 
                     ->orwhere('Caption', 'like',"%$q%" )
            ->paginate(20);
           // return view('product.home',compact('items','Families'));

            
            
        }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
