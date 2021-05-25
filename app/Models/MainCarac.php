<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCarac extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'main_carac';

    protected $hidden = [ ];
}
