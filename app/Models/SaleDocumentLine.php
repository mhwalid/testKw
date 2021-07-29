<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SaleDocumentLine extends Model
{
    protected $connection = 'sqlsrv';
    use HasFactory;

    protected $table = 'SaleDocumentLine';
    protected $hidden = [''];


    public function item()
    {
        return $this->belongsTo(Item::class, 'ItemId', 'Id');
    }

    public function ScopeSale($query)
    {
        return $query->select('ItemId')
        ->whereRaw('sysCreatedDate > DATEADD(MONTH,-8,GETDATE())')
        ->whereNotNull('ItemId')
        ->groupBy('ItemId')
        ->orderBy(DB::raw('count(ItemId)'), 'DESC');
    }
}
?>
