<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'SaleDocument';

    public $timestamps = false;
    protected $hidden = [''];
    
    public function user(){
          
        return $this->hasMany(User::class, 'id', 'id');
    }
    public function oderLine(){

        return $this->hasMany(OrderLine::class, 'DocumentId', 'Id');
    }
}
