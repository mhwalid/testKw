<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $table = 'Contact';
    public $timestamps = false;
    // ContactFields_Name
    protected $fillable = [
        'Id',
        'ContactFields_civility',
        'ContactFields_Name',
        'ContactFields_FirstName',
        'ContactFields_Phone',
        'ContactFields_Email',
        'AssociatedCustomerId',
        'OtherAddressFields_Civility',
        'OtherAddressFields_ThirdName',
        'xx_passwd',
        'xx_birthday',
    ];
    protected $hidden = [''];
    public function customer()
    {
        return $this->belongsTo(Customer::class,'AssociatedCustomerId','Id');
    }
}
