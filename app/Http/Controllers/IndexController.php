<?php

namespace App\Http\Controllers;

use App\Http\Requests\index\FilterIndexVariantsRequest;
use App\Http\Requests\index\FilterVariantsByAttributeRequest;
use App\Http\Requests\index\getDistrictByProvinceRequest;
use App\Http\Requests\index\StoreContactRequest;
use App\Http\Requests\index\StoreSiteCommentRequest;
use App\Http\Requests\index\VariantQuickViewRequest;
use App\Models\Category;
use App\Models\District;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\indexService;
use App\Services\ShopService;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    private $indexService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function __construct()
    {
        $this->indexService=new IndexService();
    }

    /**
     * @return IndexService
     */
    public function getIndexService(): IndexService
    {
        return $this->indexService;
    }

    public function index(ShopService $shopService,CategoryService $categoryService)
    {

        $variants = $this->getIndexService()->getHomePageVariants();



        $shops = $shopService->getAllShops();

        $categories = $this->getIndexService()->getRootCategories();
        return view('frondend.index')->with([
            'variants'=>$variants,
            'shops'=>$shops,
            'categories'=>$categories,

        ]);
    }

    public function filterIndexVariants(ShopService $shopService,CategoryService $categoryService,Request $request){

        $variants = $this->getIndexService()->getIndexVariantsAfterFiltering($request->category_id,$request->shop_ids,$request->price_range);

        $shops =$shopService->getAllShops();

        if ($request->has('category_id')){
            $categories = $categoryService->getDescants($request->category_id);

            if ($categories->isEmpty()){
                $categories = $this->getIndexService()->getAncestors($request->category_id);
            }
        }else{
            $categories=$this->getIndexService()->getRootCategories();
        }


        return view('frondend.index')->with([
            'variants'=>$variants,
            'shops'=>$shops,
            'descants'=>$categories,
        ]);
    }

    public  function shop($category_id){


        $variants = $this->getIndexService()->getVariantsByCategory($category_id);


        $category=$this->getIndexService()->getCategory($category_id);

        $categoryAttributes = $this->getIndexService()->getAttributesByCategoryId($category_id);

        $descendantsOfCategory =$this->getIndexService()->getCategoryDescendants($category_id);

        if ($descendantsOfCategory->isEmpty()){
            $descendantsOfCategory = $this->getIndexService()->getAncestors($category_id);
        }
        return view('frondend.shop')->with([
            'descendantsOfCategory'=>$descendantsOfCategory,
            'attributes'=>$categoryAttributes,
            'variants'=>$variants,
            'category'=>$category
        ]);


    }

    public  function variantQuickView(VariantQuickViewRequest $request){
        $medias=[];
        $variant = $this->getIndexService()->getVariantDetail($request->variant_id);

        foreach ($variant->getMedia('variants') as $index=>$media){
         array_push($medias,$variant->getMedia('variants')[$index]->getUrl('big'));
        }

        return response()->json(
        array('variant'=>$variant, 'medias'=>$medias));
    }

    public function getShopVariants(CategoryService $categoryService,$shop_id,ShopService $shopService){

      $shop =$shopService->getShop($shop_id);

      $variants =  $this->getIndexService()->getShopVariants($shop_id);

      $attributes = $this->getIndexService()->getAttributesForVariants($variants);

      $categories = $this->getIndexService()->getRootCategories();

        return view('frondend.shop')->with([
            'descendantsOfCategory'=>$categories,
            'attributes'=>$attributes,
            'variants'=>$variants,
            'category'=>$shop
        ]);
    }

    public  function getProductVariants($product_id){


        $product = Product::findOrFail($product_id);

        $variants =  $this->getIndexService()->getAllVariantsFromProduct($product_id);

        $attributes = $this->getIndexService()->getAttributesForVariants($variants);

        $categories = $this->getIndexService()->getCategoryByProductId($product_id);




        return view('frondend.productVariants')->with([
            'product'=>$product,
            'variants'=>$variants,
            'attributes'=>$attributes,
            'categories'=>$categories,
        ]);
    }

    public function storeContactRequest(StoreContactRequest  $request)
    {
        $this->getIndexService()->storeContactRequest($request->name,$request->surname,$request->email, $request->phone, $request->message);
        return back()->with([
        'message'=>"İletişim İsteğiniz Trafımıza Ulaştı "
        ]);
    }

    public  function getFaqs(){
        $faqs = $this->getIndexService()->getFaqs();

    return view('frondend.faqs')->with([
        'faqs'=>$faqs
    ]);
    }

    public  function getWholeSales(){

      $products =  $this->getIndexService()->getWholeSales();

      return view('frondend.whole_sales')->with([
          'products'=>$products
      ]);
    }

    public  function getAllPartners(){

       $partners =  $this->getIndexService()->getAllPartners();

       return view('frondend.partners')->with([
           'partners'=>$partners
       ]);
    }

    public  function storeSiteComment(StoreSiteCommentRequest $request){

        $this->getIndexService()->storeSiteComment($request->rating_name,$request->rating_surname,$request->rating_comment);
                return back()->with([
                    'message'=>'Yorumunuz Tarafımıza Ulaştı '
                ]);
    }

    public  function getSiteComments(){
        $comments = $this->getIndexService()->getSiteComments();
            return view('frondend.siteComments')->with([
                'comments'=>$comments
            ]);
    }

    public  function getDistrictByProvinceId(getDistrictByProvinceRequest $request){

        $districts = District::where('province_id',$request->province_id)->get();

        return response()->json($districts);
    }

    public  function filterVariantByAttribute(FilterVariantsByAttributeRequest $request){
        $attributes = $request->input('attribute_name_and_values');

        $variants = $this->getIndexService()->filterVariantByAttribute($attributes);


        return view('frondend.layouts.variantList')->with([


            'variants'=>$variants,

        ]);
    }
    public  function getDescants(){

    }

}
