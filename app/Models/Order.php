<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'columns_priv';

    public $timestamps = false;
    protected $fillable = ['Db'];
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
    
}
