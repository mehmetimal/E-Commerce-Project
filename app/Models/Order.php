<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public  static  $CREDIT_CARD_PAYMENT = 2;
    public  static  $PAY_FROM_HOME = 1;
    use HasFactory;
    protected $fillable = [
        "basket_id",
        "price",
        "order_type",
        "name",
        "phone",
        "surname",
        "province",
        "district",
        "description",
        "order_type",
        "state",
        "bank",
        "installment"
    ];
    public static $orderStatus = [
        'SİPARİŞ ALINDI',
        'SİPARİŞ HAZIRLANIYOR',
        'KARGOYA VERİLDİ',
        'TESLİM EDİLDİ',
        'İPTAL EDİLDİ'
    ];


    public function basket(){
        return $this->belongsTo(Basket::class);
    }
}
