<?php


namespace App\Services;


use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class AttributeValueService
{

    public function storeAttributeValue($attributeName,$values){


        try {

            $attribute = Attribute::where('slug',Str::slug($attributeName))->firstOrFail();
            foreach ($values  as $value){
                $attribute->values()->create([
                    'name'=>$value
                ]);
            }


        }catch (Exception $exception){

            return  $exception->getMessage();

        }
    }

    public function deleteValue($value_id){
        return AttributeValue::destroy($value_id);
    }

}
