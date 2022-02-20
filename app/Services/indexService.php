<?php


namespace App\Services;


use App\Models\Attribute;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Product;
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
    public function getIndexVariantsAfterFiltering($categoryId ,$shopIds,$priceRange){
        if ($priceRange ){
            $priceSplited = explode('-',$priceRange);
        }else{
            $priceSplited =null;
        }
        return  Variant::when($categoryId,function ($filterByCategory) use($categoryId){

            $filterByCategory->whereHas('product',function ($productCategoryQuery) use($categoryId){
                $category = Category::descendantsAndSelf($categoryId)->pluck('id')->values();

                $productCategoryQuery->whereIn('category_id',$category)->orWhere('category_id',$categoryId);

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

        return Variant::whereHas('product',function ($productCategoryQuery) use($category_id){

            $category = Category::descendantsAndSelf($category_id)->pluck('id')->values();

            $productCategoryQuery->whereIn('category_id',$category);
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
        return Variant::with('product.detail','product.shop','media')->findOrFail($variant_id);

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


        $product =Product::findOrFail($product_id);

        $categories = Category::descendantsOf($product->category_id);
        if ($categories->isEmpty()){
            return  Category::ancestorsOf($product->category_id);
        }
        return $categories;
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

    public  function filterVariantByAttribute($attributes){


       return Variant::whereHas('attributes', function ($query) use ($attributes) {
            foreach ($attributes as $i => $attr) {
                $query->{$i === 0 ? 'where' : 'orWhere'}(function ($query) use ($attr) {
                    $query
                        ->where('attribute_id', $attr['attribute_id'])
                        ->whereIn('value_id', $attr['value_id']);
                });
            }
        })->paginate(20);

    }
    public  function getRootCategories(){
        return  Category::whereIsRoot()->get();
    }
    public  function getAncestors($category_id){
       return  Category::ancestorsOf($category_id);
    }
}
