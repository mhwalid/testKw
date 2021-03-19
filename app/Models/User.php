<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Customer';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'MainDeliveryAddress_CityINSEE', 'MainInvoicingAddress_CodeINSEE', 'MainInvoicingAddress_CityINSEE', 'HeadOfficeAddress_CodeINSEE', 'HeadOfficeAddress_CityINSEE', 'NeotouchSendingType', 'NeotouchDuplicateSendingType', 'NeotouchContactsIdForDuplicate'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //stock between dilivered and real stock (RoundId)
}
