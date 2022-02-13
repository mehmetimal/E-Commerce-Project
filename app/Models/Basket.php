<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = ['user_id',"is_delivered"];
    use HasFactory;
    public function items(){
        return $this->hasMany(BasketItem::class);
    }
}
