<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    use HasFactory;
    protected $fillable=["basket_id","qty","image_url","price","name"];
    public function variant(){

        return $this->belongsTo(Variant::class);

    }
    public function basket(){

        return $this->belongsTo(Basket::class);

    }
}
