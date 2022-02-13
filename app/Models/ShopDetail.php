<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopDetail extends Model
{
    protected $fillable=[
        'shop_type',
        'shop_id',
        'address',
        'Iban',
        'IdentityNumber',
        'tax_number',
        'tax_office',
        'legal_company_title',

    ];
    use HasFactory;
}
