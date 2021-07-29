<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use LdapRecord\Laravel\Auth\HasLdapUser;

class Admin extends Authenticatable implements LdapAuthenticatable
{
    use Notifiable,AuthenticatesWithLdap,HasLdapUser;

    protected $connection = 'mysql';
    protected $table = 'admins';


    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
         'remember_token',
    ];
}
