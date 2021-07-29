<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Item extends Model
{

    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'Item';


    public $timestamps = false;
    protected $fillable = ['RealStock', 'Id','FamilyId','BarCode','SubFamilyId','Caption','DesComClear','UniqueId'];

    public function family()
    {
        return $this->belongsTo(Family::class, 'FamilyId', 'Id');
    }
    public function caracteristiques()
    {
        return $this->hasMany(Caracteristique::class,'IdItem', 'Id');
    }

    public function ScopeItemA($query)
    {
        return $query->where('SalePriceVatExcluded', '>', 0)->where('ActiveState', '=', 0)->where('ItemType', '=', 0)->orderBy('RealStock','desc');
    }
    public function ScopeItemNT($query)
    {
        return $query->where('SalePriceVatExcluded', '>', 0)->where('ActiveState', '=', 0)->where('ItemType', '=', 0);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()->ItemA()
            : static::query()->where('Caption', 'like', '%' . $search . '%')->orWhere('BarCode ','like' ,'%'.$search.'%');
    }

    public function arrivage()
    {
        return $this->hasMany(Arrivage::class, 'ItemId', 'Id')->whereRaw('DeliveryDate > DATEADD(month, -1, SYSDATETIME())');
    }
    public function maincarac()
    {
        return $this->hasOne(MainCarac::class,'id_item', 'Id');
    }
}

