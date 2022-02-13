<?php

namespace App\Http\Controllers;


use App\Services\ProductService;
use App\Services\VariantService;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VariantController extends Controller
{
    private $variantService;

    public function __construct()
    {
        $this->middleware('permission:Read Variant')->only('index', 'show');

        $this->middleware('permission:Create Variant')->only('create'
            , 'store', 'uploadImage', 'deleteImage', 'updateIsSold');

        $this->middleware('permission:Update Variant')->only('update', 'edit');

        $this->middleware('permission:Delete Variant')->only('destroy');


        $this->middleware('role:Admin|Super Admin')->only('updateIsPublished');


        $this->variantService = new VariantService();

    }

    /**
     * @return VariantService
     */
    public function getVariantService(): VariantService
    {
        return $this->variantService;
    }

    public function index()
    {
        $variants = $this->getVariantService()->getVariantsByRole();

        return view('backend.variant.index')->with([
            'variants' => $variants
        ]);
    }

    public function create(ProductService $productService)
    {
        $products = $productService->getProductsByRole();

        return view('backend.variant.create')->with([
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {

        $this->getVariantService()->storeVariant($request->product_id, $request->variants);

        return response()->json($request->product_id);
    }

    public function edit($variant_id)
    {
        $variant = $this->getVariantService()->getVariant($variant_id);

        return view('backend.variant.edit')->with([
            'variant' => $variant
        ]);

    }

    public function update(Request $request, $variant_id)
    {
        $this->getVariantService()->updateVariant($request, $variant_id);

        return back()->with([
            'message' => 'Varyant Basarılı Bir Şekilde Guncellendi !'
        ]);
    }

    public function destroy($variant_id)
    {
        $this->getVariantService()->deleteVariant($variant_id);

        return back()->with([
            'message' => 'Varyant Basarılı Bir Sekilde Silindi !'
        ]);
    }

    public function uploadImage(Request $request, $variant_id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $this->getVariantService()->uploadImage($request, $variant_id);

        return back()->with([
            'message' => 'Resim Eklendi !'
        ]);
    }

    public function deleteImage($media_id)
    {

        $media = Media::findOrFail($media_id);

        $media->delete();

        return back();
    }

    public function updateIsSold(Request $request)
    {

        $this->getVariantService()->updateIsSold($request);

        return back()->with([
            'message' => 'Guncelleme Basarılı'
        ]);


    }
    public  function notPublishedVariants(){

    $variants =    $this->getVariantService()->getNotPublishedVariants();
    return view('backend.variant.index')->with([
        'variants'=>$variants
    ]);
    }
    public  function updateIsPublished(Request $request){
        $this->getVariantService()->updateIsPublished($request);

        return back()->with([
            'message' => 'Guncelleme Basarılı'
        ]);
    }
}
