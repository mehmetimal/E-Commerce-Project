<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{


    protected $fillable=["isSlider", "isSpecial","tax", "short_description", "long_description"];
    use HasFactory;



}
