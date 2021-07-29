<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    protected $table = 'Customer';

    public $timestamps = false;

    protected $fillable = [
        'Id',
        'Civility',
        'Name',
        'UseInvoicingAddressAsDeliveryAddress',
        'MainDeliveryAddress_Address1',
        'MainDeliveryAddress_ZipCode',
        'MainDeliveryAddress_City',
        'MainDeliveryAddress_Description',
        'MainDeliveryAddress_Civility',
        'MainDeliveryAddress_ThirdName',
        'MainDeliveryAddress_WebSite',
        'MainInvoicingAddress_Address1',
        'MainInvoicingAddress_ZipCode',
        'MainInvoicingAddress_City',
        'MainInvoicingAddress_Description',
        'MainInvoicingAddress_Civility',
        'MainInvoicingAddress_ThirdName',
        'MainInvoicingAddress_WebSite',
        'MainDeliveryContact_Civility',
        'MainDeliveryContact_Name',
        'MainDeliveryContact_FirstName',
        'MainDeliveryContact_Phone',
        'MainDeliveryContact_Email',
        'MainInvoicingContact_Civility',
        'MainInvoicingContact_Name',
        'MainInvoicingContact_FirstName',
        'MainInvoicingContact_Phone',
        'MainInvoicingContact_Email',
        'Siren',
        'NAF',
        'UniqueId',
        'xx_siret',
        'NIC',
        'TerritorialityId',
        'DefaultBankAccountId',
        'IntracommunityVATNumber',
    ];
    protected $hidden = ['LoyaltyCardId'];

    public function contact()
    {
        return $this->hasMany(Contact::class,'AssociatedCustomerId','Id');
    }

}
