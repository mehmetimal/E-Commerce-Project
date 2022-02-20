<?php


namespace App\Services;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Str;


class AttributeService
{
    public function  getAllAttributes(){
       return  Attribute::all();
    }
    public  function isAttributeSlugExists($name){
        return Attribute::where('slug',Str::slug($name))->exists();
    }
    public function isAttributeValueExists($attributeValue){
        return AttributeValue::where('slug',Str::slug($attributeValue))->exists();
    }
    public  function updateAttribute($attributeOldName,$attributeName){

            try {
                return Attribute::where('slug',Str::slug($attributeOldName))->update([
                    'name'=>$attributeName,
                    'slug'=>Str::slug($attributeName),
                ]);
            }catch (\Exception $exception){
                return  $exception->getMessage();
            }
        }
    public function getAttribute($attribute_id){
          return Attribute::with('values')->findOrFail($attribute_id);

      }
    public function deleteAttribute($attribute_id){
        return Attribute::destroy($attribute_id);


      }
    public  function getAttributesWithValues($attributeIds){
    return Attribute::whereIn('id',$attributeIds)->orderByDesc('id')->with('values')->get();

    }
    public function storeAttribute($name){
        Attribute::create([
            'name'=>$name,
        ]);

}
}
