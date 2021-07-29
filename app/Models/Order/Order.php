<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'SaleDocument';

    public $timestamps = false;
    protected $hidden = [''];

    public function contact(){

        return $this->belongsTo(Contact::class, 'InvoicingContactId', 'Id');
    }
    public function customer(){

        return $this->belongsTo(Customer::class, 'CustomerId', 'Id');
    }

    public function oderLine(){

        return $this->hasMany(OrderLine::class, 'DocumentId', 'Id');
    }
}
