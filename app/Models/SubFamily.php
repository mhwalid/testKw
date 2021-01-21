<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubFamily extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'ItemSubFamily';
    protected $keyType = 'string';

    protected $fillable = [
        'Caption' ,'ItemFamilyId' ,'Id' 
    ];

    public function family()
    {
        return $this->belongsTo(Family::class , 'Id');
    }

    

    
}
