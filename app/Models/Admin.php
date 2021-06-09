<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $connection = 'mysql';
    protected $table = 'admins';


    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
         'remember_token',
    ];
}
