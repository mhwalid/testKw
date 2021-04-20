<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;
    protected $table = 'Item';

    public $timestamps = false;
    protected $fillable = ['RealStock', 'Id'];

    // protected $hidden = [
    //     'sysCreatedDate', 'SubjectToIRPF', 'xx_Demat', 'xx_id_presta', 'sysCreatedUser', 'sysDatabaseId', 'xx_Demat', 'xx_Reference_constructeur',
    // ];

    public function family()
    {
        return $this->hasMany(Family::class, 'FamilyId', 'Id');
    }

    public function ScopeItemA($query)
    {
        return $query->where('SalePriceVatExcluded', '>', 0)->where('ActiveState', '=', 0)->where('ItemType', '=', 0)->orderBy("sysCreatedDate", 'desc');
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
}
