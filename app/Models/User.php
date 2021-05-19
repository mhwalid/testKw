<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $connection = 'mysql';
    protected $table = 'users';

    public $timestamps = false;
    protected $fillable = [ 'email', 'remember_token','password','Id','name'];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class ,'IdUser','Id');
    }

}
