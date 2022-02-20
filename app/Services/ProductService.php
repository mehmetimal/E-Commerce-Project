<?php


namespace App\Services;


use App\Models\Attribute;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    public function getProductsByRole(){
        if (Auth::user()->hasRole(['Super Admin','Admin'])){

            return $this->getAllProducts();

        }else{
            return $this->getAllShopProducts();
        }


    }
    public  function getAllProducts(){

        return Product::with('shop')->get();

    }

    public function getProduct($product_id){
       return  Product::whereHas('shop',function ($shopQuery){
           $shopQuery->where('user_id',Auth::id());
       })->with('categories','detail')->findOrFail($product_id);
    }

    public function  storeProduct(Request $request){
        $variantsRequest = $request->variants;

        $productRequest = $request->product;

        $productDetailsRequest = $request->productDetails;

        $productAttributesRequest = $request->productAttributes;

        $productRequest["price"] = str_replace('₺', '', $productRequest["price"]);

        //ADD PRDDUCT
        $productTotalQuantity = collect($variantsRequest)->sum("quantity");

        $barcode = $this->generateUniqueCode();

        $is_published=Auth::user()->hasRole('Super Admin|Admin') ?  1 : 0;

        $shop_id =Auth::user()->hasRole('Super Admin|Admin') ?  $request->shopId : Auth::id();

        $product = Product::create([
                    'category_id'=>$productRequest["category_id"],
                    'name'=>$productRequest["name"],
                    'price' => $productRequest["price"],
                    'quantity' =>$productTotalQuantity,
                    'shop_id'=> $shop_id ,//Dükkanın idsi gelmesi lazım simdlik 1
                    'is_published' => $is_published,//Yetki Bazlı Olması lazım şimdlik tamam
                    'barcode' => $barcode,

            ]);

            $product->detail()->create([
                'isSlider' => $productDetailsRequest["isSlider"]    ? 1 : 0,
                'isSpecial' => $productDetailsRequest["isSpecial"]  ? 1 : 0,
                'short_description' => $productDetailsRequest["short_description"],
                'long_description' => $productDetailsRequest["long_description"],
            ]);

             foreach ($productAttributesRequest as $productAttribute) {

                 $product->attributes()->create([
                     'attribute_id' => $productAttribute["attribute_id"],
                     'value_id' => $productAttribute["value_id"],
                 ]);
             }

            return $product->id;
    }

    public  function updateProduct(Request $request,$product_id){

        try {

            $product= Product::whereHas('shop',function ($shopQuery){
                $shopQuery->where('user_id',Auth::id());
            })->findOrFail($product_id);

            $product->update([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'price'=>$request->price,
                'is_published'=>1,
            ]);

            $product->detail()->update([
                'long_description'=>$request->long_description,
                'short_description'=>$request->short_description,
                'isSlider'=>$request->has('isSlider'),
                'isSpecial'=>$request->has('isSpecial'),
            ])  ;

        }catch (\Exception $exception){

            dd($exception->getMessage());
        }

        return  "Ürün Basaşarıyla Güncellendi !";
    }

    public function generateUniqueCode(){
        do {
            $code = random_int(100000, 999999);
        } while (Product::where("barcode", "=", $code)->first());

        return $code;
    }

    public  function getProductVariants($product_id){

        return Variant::whereHas('product.shop',function ($shopQuery){
           // $shopQuery->where('user_id',Auth::id());
        })->where('product_id',$product_id)->with('media','product')->get();


    }

    public  function deleteProduct($product_id){


        $product = Product::whereHas('shop',function ($shopQuery){
            $shopQuery->where('user_id',Auth::id());
        })->findOrFail($product_id);

        $variant_ids = $product->variants()->pluck('id')->toArray();

        $product->attributes()->delete();

        $product->categories()->detach();

        $variants = Variant::whereIn('id',$variant_ids)->get();

        foreach ($variants  as $variant){
            $variant->delete();
        }

        return   $product->delete();
    }


     public function getProductAttributesByProductId($product_id){

        return Attribute::with('values')->whereHas('products',function ($query) use($product_id ){
             $query->where('product_id',$product_id );
         })->get();



     }
     public  function getAllShopProducts(){
       return Product::whereHas('shop',function ($shopQuery){
                $shopQuery->where('user_id',Auth::id());
            });
}
}
