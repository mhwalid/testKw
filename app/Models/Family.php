<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $connection = 'sqlsrv';
    use HasFactory;

    protected $table = 'ItemFamily';
    protected $hidden = [];

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'Caption' ,'ItemFamilyId' ,'Id','MainIntervener'
    ];

    public function item()
    {
    return $this->belongsToMany(Item::class ,'FamilyId','Id' );
    }


    public function subFamily()
    {
    return $this->hasMany(SubFamily::class,'ItemFamilyId','Id');
    }
}
