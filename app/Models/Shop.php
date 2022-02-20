<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Shop extends Model implements HasMedia
{
    use InteractsWithMedia ,HasFactory;
    protected $fillable=["user_id","name","nick_name"];


   public  function user(){
       return $this->belongsTo(User::class,'user_id');
   }
    public function registerMediaCollections(): void
    {

        $this->addMediaCollection('shop_logos')->singleFile();

    }
    public function detail(){
       return $this->hasOne(ShopDetail::class,'shop_id');
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
    public static  $PERSONAL_SHOP=1;
    public static  $PRIVATE_SHOP=2;
    public static  $LIMITED_SHOP=3;


}
