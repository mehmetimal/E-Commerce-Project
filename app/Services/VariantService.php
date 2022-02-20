<?php


namespace App\Services;


use App\Models\Product;
use App\Models\Variant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VariantService
{
    public  function getVariantsByRole(){
        if (Auth::user()->hasRole(['Super Admin','Admin'])){
            return  $this->getVariants();
        }else{
            return Variant::whereHas('product.shop',function ($shopQuery){
                $shopQuery->where('user_id',Auth::id());
            })->get();
        }
    }
    public  function getVariants(){
       return  Variant::orderByDesc('created_at')->with('product.shop')->get();
    }

  public  function getVariant($variant_id){
        return Variant::with('media','product')->findOrFail($variant_id);
  }

  public  function storeVariant( $productId, $variants){
        $variantIds=[];

        $product = Product::findOrFail($productId);

        $is_published=Auth::user()->hasRole('Super Admin|Admin') ?  1 : 0;

        foreach ($variants  as $variant) {
            $newVariant = $product->variants()->create([
                'product_id'=>$product->id,
                'barcode' =>$this->generateUniqueCodeForVariant(),
                'quantity' => $variant["quantity"],
                'price' => $variant["price"],
                'sku' =>   $product->id.'-'.Str::slug($variant["variant_name"]),
                'name' => $variant["variant_name"],
                'is_published'=>$is_published
            ]);

            foreach ($variant["variantAttributesAndValues"]["variantAttributesTmp"] as $variantAttributesAndValues) {

                $newVariant->attributes()->create([
                    'attribute_id' => $variantAttributesAndValues["attribute_id"],
                    'value_id' => $variantAttributesAndValues["value_id"],
                ]);

            }
            array_push($variantIds,$newVariant->id);
        }

        return $variantIds ;
    }

  public  function updateVariant(Request $request,$varaint_id){

        $variant  =Variant::findOrFail($varaint_id);

        $variant->update([
            'quantity'=>$request->quantity,
            'price'=>$request->price
        ]);
    }

  public function generateUniqueCodeForVariant()
    {

        do {
            $code = random_int(100000, 999999);
        } while (Variant::where('barcode', $code)->first());

        return $code;

    }

  public  function getVariantsById($variant_ids){

        return Variant::with('media')->whereIn('id',[$variant_ids])->get();


    }

  public  function uploadImage($request,$variant_id){
        $variant = Variant::findOrFail($variant_id);
        $variant->addMedia($request->image)->toMediaCollection('variants');
    }

  public  function updateIsSold(Request $request){
        $variant = Variant::findOrFail($request->variant_id);

        $variant->update([
            'is_sold'=>$request->isSold
        ]);

        return back();
    }

  public function deleteVariant($variant_id){
        $variant = Variant::findOrFail($variant_id);
        $variant->delete();
  }


public  function getNotPublishedVariants(){
    if (Auth::user()->hasRole(['Super Admin','Admin'])){

        return Variant::where('is_published',0)->get();
    }else{
        return Variant::whereHas('product.shop',function ($shopQuery){
            $shopQuery->where('user_id',Auth::id());
        })->where('is_published',0)->get();
    }

}
public  function updateIsPublished(Request $request){

        $variant = Variant::findOrFail($request->variant_id);

    $variant->update([
        'is_published'=>$request->isPublished
    ]);

    return back();
}
}
