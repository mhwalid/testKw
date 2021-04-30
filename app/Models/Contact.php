<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $table = 'Contact';
    public $timestamps = false; 
    // ContactFields_Name
    protected $hidden = [''];

}
