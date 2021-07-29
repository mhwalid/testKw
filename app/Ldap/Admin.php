<?php

namespace App\Ldap;

use LdapRecord\Models\Model;
use LdapRecord\Models\Concerns\CanAuthenticate;
use Illuminate\Contracts\Auth\Authenticatable;

class Admin extends Model implements Authenticatable
{

    use CanAuthenticate;
    /**
     * The object classes of the LDAP model.
     *
     * @var array
     */
    public static $objectClasses = [
    ];

    protected $guidKey = 'objectguid';

}
