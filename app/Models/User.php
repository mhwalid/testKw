<?php

namespace App\Models;

use App\Models\Order\Order;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $connection = 'mysql';
    protected $table = 'users';
    
    protected $fillable = [ 'email', 'remember_token','password','Id','IdUser','name'];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];   
    
    public function contact()
    {   
        return $this->belongsTo(Contact::class ,'IdUser','Id');
    }
    
    public function Orders(){
        return $this->hasMany(Order::class ,'InvoicingContactId','IdUser')->where('DocumentType','=', 2);   
    }

    
}
