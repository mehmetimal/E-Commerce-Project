<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable=["isSlider","isSpecial","shop_id","name","price","quantity","is_published","barcode","category_id"];
    protected $appends=["variant_id"];

    public function categories (){
        return $this->belongsToMany(Category::class,ProductCategory::class,'product_id','category_id');
    }

    public function detail (){
        return $this->hasOne(ProductDetail::class,'product_id');
    }

    public function variants(){
        return $this->hasMany(Variant::class,'product_id');
    }

    public function attributes(){
        return $this->hasMany(ProductAttribute::class,'product_id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products');

    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('small')
            ->width(368)
            ->height(232)
            ->sharpen(10);
        $this->addMediaConversion('medium')
            ->width(368)
            ->height(232)
            ->sharpen(10);
        $this->addMediaConversion('big')
            ->width(368)
            ->height(232)
            ->sharpen(10);
        $this->addMediaConversion('banner')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        $this->attributes['slug'] = Str::slug($value);
    }
public  function getAttributeIdAttribute(){

}
public  function getVariantIdAttribute(){

}
}
