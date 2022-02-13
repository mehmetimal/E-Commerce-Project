<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Attribute extends Model
{
    use HasFactory;
    protected  $fillable=['name','slug'];

    public  function values(){
        return $this->hasMany(AttributeValue::class,'attribute_id');
    }

    public  function categories(){
        return $this->belongsToMany(Category::class,CategoryAttribute::class,'attribute_id','category_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,ProductAttribute::class,'attribute_id','product_id');
    }


    public function  setNameAttribute($value){
        $this->attributes['name'] =ucfirst($value) ;

        $this->attributes['slug'] = Str::slug($value);

    }

}
