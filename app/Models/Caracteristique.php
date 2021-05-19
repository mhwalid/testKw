<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristique extends Model
{
    protected $connection = 'mysql';
    protected $table = 'caracteristiques';
    public $timestamps = false;   protected $hidden = [''];



    public function Item(){
        return $this->belongsTo(Item::class);
    }


}
