<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Variant extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable=["barcode", "quantity", "price", "sku", "name","is_sold","is_published"];
    protected $appends=["attribute_id"];

    public  function product(){
        return $this->belongsTo(Product::class);
    }
    public function attributes(){
        return $this->hasMany(VariantAttribute::class,'variant_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('variants');

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
            ->width(700)
            ->height(700)
            ->sharpen(10);
        $this->addMediaConversion('banner')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }
    public  function getAttributeIdAttribute(){

    }
}
