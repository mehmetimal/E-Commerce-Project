<?php


namespace App\Services;


use App\Models\Attribute;
use App\Models\AttributeValue;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class AttributeService
{


    public function  getAllAttributes(){
       return  Attribute::all();
    }
    public  function isAttributeSlugExists(Request $request){
        return Attribute::where('slug',Str::slug($request->attributeName))->exists();
    }
    public function isAttributeValueExists(Request $request){
        return AttributeValue::where('slug',Str::slug($request->attributeValue))->exists();
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
public function storeAttribute(Request $request){

        Attribute::create([
            'name'=>$request->name,
        ]);

}
}
