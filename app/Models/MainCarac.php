<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCarac extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'main_carac';
    public $timestamps = false;
    protected $fillable = [ 'id_item',
    'code_bar',
    'family',
    'subfamily',
    'description',
    'marque',
    'taille_ecran',
    'fam_proc',
    'mod_proc',
    'sock_proc',
    'os',
    'ssd',
    'stockage',
    'memoire',
    'puissance',
    'frequ_memoire',
    'cg',
    'chipset',
    'ram',
    'gpu',
    'nb_barrette',
    'resolution_ecran'
];
}
