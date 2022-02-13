<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WholeSale extends Model
{
    protected $fillable = ["product_id","price","description"];
    use HasFactory;
    public  function product(){
        return $this->belongsTo(Product::class);
    }
}
