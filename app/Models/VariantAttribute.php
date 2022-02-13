<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantAttribute extends Model
{
    use HasFactory;
    protected $fillable=["attribute_id","value_id"];


    public  function attribute(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
}
