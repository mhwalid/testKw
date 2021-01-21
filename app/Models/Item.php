<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;
    protected $table = 'Item';

    protected $fillable = [
        'id',
        'Notes',
        'ItemType',
        'Caption',
      'FamilyId',
      'SubFamilyId',
      'ItemType',
      'CostPrice',
      'StockVarianceAccount',
      'BarCode',
      'Quantity',
      'xx_categorie1',
      'localizableCaption_2',
      'localizableCaption_3',
      'localizableCaption_4',
      'xx_categorie2',
      'xx_categorie3',
      'xx_categorie3',
    ];
    
    public $timestamps = false;

    protected $hidden = [
      
        'sysCreatedDate',
        'SubjectToIRPF',
        'xx_Demat',
        'xx_id_presta',
        'sysCreatedUser',
        'sysDatabaseId',
// ​​         'sysEditCounter',
//             'sysModifiedDate',
//             'sysModuleId',
//             'sysRecordVersion',
//             'sysRecordVersionId',
//             'xx_Categorie1',
//             'xx_Demat',
//             'xx_Reference_constructeur',
//             'xx_categorie2',
//             'xx_categorie3',

        
    ];

    public function family()
    {
        return $this->hasMany(Family::class ,'FamilyId','Id');
    }

    

    

   

}
