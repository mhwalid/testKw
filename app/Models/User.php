<?php

namespace App\Models;

use App\Notifications\VerifyEmailNotification;
use App\Models\Order\Order;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $connection = 'mysql';
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = [
        'email',
        'remember_token',
        'password',
        'Id',
        'name',
        'IdUser',
        'civility',
        'first_name',
        'phone',
        'birthday',
        'newsletter',
        'adresse1',
        'adresse2',
        'zipcode',
        'city',
        'statut',
        'compagny',
        'siret',
        'ape',
        'vat_number',
        'soc_fac_adr1',
        'soc_fac_adr2',
        'soc_fac_zc',
        'soc_fac_city',
        'soc_tel',
        'soc_liv_adr1',
        'soc_liv_adr2',
        'soc_liv_zc',
        'soc_liv_city',
        'ifSameAdress',
        'website',
        'rib_domicil',
        'rib_iban',
        'rib_bic',
        'rib_iso',
        'rib_compte',
        'compte_actif',
        'date_inscription',
        'have_customer',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class ,'IdUser','Id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }

    public function Orders(){
        return $this->hasMany(Order::class ,'InvoicingContactId','IdUser')->where('DocumentType','=', 2);   
    }

    
}
