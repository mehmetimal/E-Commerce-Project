<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Variant;
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
        abort(404);
        $variants = $this->getIndexService()->getHomePageVariants();



        $shops =$shopService->getAllShops();

        $categories = $categoryService->getAllCategories();
        return view('frondend.index')->with([
            'variants'=>$variants,
            'shops'=>$shops,
            'categories'=>$categories,

        ]);
    }




    public function filterIndexVariants(ShopService $shopService,CategoryService $categoryService,Request $request){


        $variants = $this->getIndexService()->getIndexVariantsAfterFiltering($request->category_ids,$request->shop_ids,$request->price_range);

        $shops =$shopService->getAllShops();

        $categories = $categoryService->getAllCategories();

       return view('frondend.index')->with([
            'variants'=>$variants,
            'shops'=>$shops,
            'categories'=>$categories,
        ]);
    }

    public  function shop(CategoryService $categoryService,$category_id){

        $variants = $this->getIndexService()->getVariantsByCategory($category_id);

        $category=$this->getIndexService()->getCategory($category_id);

        $categoryAttributes = $this->getIndexService()->getAttributesByCategoryId($category_id);

        $descendantsOfCategory =$this->getIndexService()->getCategoryDescendants($category_id);



        return view('frondend.shop')->with([
            'descendantsOfCategory'=>$descendantsOfCategory,
            'attributes'=>$categoryAttributes,
            'variants'=>$variants,
            'category'=>$category
        ]);


    }

    public  function variantQuickView(Request $request){
        $medias=[];
        $variant = $this->getIndexService()->getVariantDetail($request->variant_id);

        foreach ($variant->getMedia('variants') as $index=>$media){
         array_push($medias,$variant->getMedia('variants')[$index]->getUrl('big'));
        }

        return response()->json(
        array('variant'=>$variant, 'medias'=>$medias));
    }

    public function getShopVariants(CategoryService $categoryService,$shop_id){

      $shop =Shop::findOrFail($shop_id);

      $variants =  $this->getIndexService()->getShopVariants($shop_id);

      $attributes = $this->getIndexService()->getAttributesForVariants($variants);

      $categories = $categoryService->getAllCategories();

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

    public function storeContactRequest(Request  $request)
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
    public  function storeSiteComment(Request $request){
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
    public  function getDistrictByProvinceId(Request $request){

        $districts = District::where('province_id',$request->province_id)->get();

        return response()->json($districts);
    }
    public  function filterVariantByAttribute(Request $request){


        $attributes = $request->input('attribute_name_and_values');

       $variants = Variant::whereHas('attributes', function ($query) use ($attributes) {
            foreach ($attributes as $i => $attr) {
                $query->{$i === 0 ? 'where' : 'orWhere'}(function ($query) use ($attr) {
                    $query
                        ->where('attribute_id', $attr['attribute_id'])
                        ->whereIn('value_id', $attr['value_id']);
                });
            }
        })->paginate(20);


        return view('frondend.layouts.variantList')->with([


            'variants'=>$variants,

        ]);
    }
}
