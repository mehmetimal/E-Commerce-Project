<?php


namespace App\Services;


use App\Models\Attribute;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Shop;
use App\Models\SiteRating;
use App\Models\SiteSetting;
use App\Models\Variant;
use App\Models\WholeSale;
use http\Env\Request;

class indexService
{

    public  function getHomePageVariants(){
       return  Variant::with('product','product.shop','attributes')->where('is_sold',0)->where('is_published',1)->paginate(20);

    }

public function getAttributesForVariants($variants){
   if ($variants->items()){
       foreach ($variants as $variant){
           $variant_attribute_ids  [] = $variant->attributes()->pluck('attribute_id')->toArray();

       }
       $attribute_ids  = collect($variant_attribute_ids)->unique()->flatten(1);

       return  Attribute::whereIn('id',$attribute_ids)->with('values')->get();

   }else{
       return array();
   }

}
    public function getIndexVariantsAfterFiltering($categoryIds ,$shopIds,$priceRange){
if ($priceRange ){
    $priceSplited = explode('-',$priceRange);
}else{
    $priceSplited =null;
}


        return  Variant::when($categoryIds,function ($filterByCategory) use($categoryIds){

            $filterByCategory->whereHas('product.categories',function ($productCategoryQuery) use($categoryIds){

                $productCategoryQuery->whereIn('category_id',$categoryIds);

            });

        })->when($shopIds,function ($filterByShop) use($shopIds){

            $filterByShop->whereHas('product.shop',function ($shopQuery) use($shopIds){
                $shopQuery->whereIn('shop_id',$shopIds);

            });

        })->when($priceSplited,function ($filterPrice) use($priceSplited){

            $filterPrice->whereBetween('price', [$priceSplited[0], $priceSplited[1]]);
        })->where('is_sold',0)->where('is_published',1)->paginate(20);

    }


    public  function getAttributesByCategoryIds($category_ids){

        return  Attribute::whereHas('categories',function ($categoryQuery)use($category_ids){
            $categoryQuery->whereIn('category_id',$category_ids);
        })->with('values')->get();

    }
    public  function getVariantsByCategory($category_id){

        return Variant::whereHas('product.categories',function ($productCategoryQuery) use($category_id){
            $productCategoryQuery->where('category_id',$category_id);
        })->where('is_sold',0)->where('is_published',1)->paginate(20);

    }
    public function getAttributesByCategoryId($category_id){

        return Attribute::with('values')->whereHas('categories',function ($productAttributeQuery)use($category_id){

            $productAttributeQuery->where('category_id',$category_id);
        })->get();
    }
    public function getCategoryDescendants( $category_id){
        return Category::descendantsOf($category_id);
    }
    public  function getCategory($category_id){
        return Category::findOrFail($category_id);
    }
    public  function getVariantDetail($variant_id){
        return Variant::with('product.detail','media')->findOrFail($variant_id);

    }
    public function getShopVariants($shop_id){
        return Variant::with('media')->whereHas('product',function ($shopQuery) use($shop_id){

            $shopQuery->where('shop_id',$shop_id);

        })->where('is_sold',0)->where('is_published',1)->paginate(20);
    }
    public function getVariantDetailWithAllVariants($variant_id){
        return Variant::with('product.detail','media','product.variants')->findOrFail($variant_id);
    }
    public  function getAllVariantsFromProduct($product_id){
       return  Variant::with('media')->whereHas('product',function ($productQuery) use($product_id){
            $productQuery->where('id',$product_id);
        })->where('is_sold',0)->where('is_published',1)->paginate(20);
    }
    public  function getCategoryByProductId($product_id){
       return  Category::whereHas('products',function ($productQuery)use($product_id){
            $productQuery->where('product_id',$product_id);
        });
    }
    public  function storeContactRequest($name, $surname, $email, $phone, $message){
        Contact::create([
            'name'=>$name,
            'surname'=>$surname,
            'email'=>$email,
            'phone'=>$phone,
            'message'=>$message
        ]);
    }
    public  function getFaqs(){
        return Faq::all();
    }
    public  function getWholeSales(){
       return WholeSale::with('product')->paginate(20);
    }
    public  function getAllPartners(){
        return Shop::paginate(20);
    }
    public  function storeSiteComment($name,$surname,$comment){

        SiteRating::create([
            'name'=>$name,
            'surname'=>$surname,
            'comment'=>$comment,
        ]);
    }
    public  function getSiteComments(){
        return SiteRating::where('is_published',1)->get();
    }
}
