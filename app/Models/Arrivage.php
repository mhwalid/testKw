<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrivage extends Model
{
    use HasFactory;

    protected $table = 'PurchaseDocumentLine';

    protected $fillable = ['Quantity', 'DeliveryDate', 'ItemId'];
}
