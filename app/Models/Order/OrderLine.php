<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'SaleDocumentLine';

    public $timestamps = false;
    protected $hidden = [''];
}
