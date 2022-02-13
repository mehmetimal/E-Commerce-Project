<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class   Category extends Model implements HasMedia
{
    use HasFactory,NodeTrait,InteractsWithMedia;
    protected $fillable=['name',"slogan","isSpecial","description"];



    public  function attributes(){
        return $this->belongsToMany(Attribute::class,CategoryAttribute::class,'category_id','attribute_id');
    }

    public function products (){
        return $this->belongsToMany(Category::class,ProductCategory::class,'category_id','product_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categories')->singleFile();

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





    public    function  setNameAttribute($value){
        $this->attributes['name'] = $value;

        $this->attributes['slug'] = Str::slug($value);

    }



}
