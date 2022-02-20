<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\ShopService;
use App\Services\VariantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    private $productService;

    public function __construct()
    {
        $this->middleware('permission:Read Product')->only('index', 'show', 'getProductVariants');

        $this->middleware('permission:Create Product')->only('create', 'store', 'saveImageForProductAndImages', 'getProductAttributesByProductId');

        $this->middleware('permission:Update Product')->only('update', 'edit');

        $this->middleware('permission:Delete Product')->only('destroy');

        $this->productService = new ProductService();
    }

    /**
     * @return ProductService
     */
    public function getProductService(): ProductService
    {
        return $this->productService;
    }

    public function index()
    {
        $products = $this->getProductService()->getProductsByRole();

        return view('backend.product.index')->with([
            'products' => $products,
        ]);
    }


    public function create(ShopService $shopService, CategoryService $categoryService)
    {
        $categories =  Category::whereIsRoot()->get();

        $shops = $shopService->getShopsByRole();

        return view('backend.product.create')->with([
            'categories' => $categories,
            'shops' => $shops,
        ]);
    }


    public function store(VariantService $variantService, Request $request)
    {
        $productId = $this->getProductService()->storeProduct($request);

        $variantService->storeVariant($productId, $request->variants);

        return response()->json($productId);


    }


    public function edit(CategoryService $categoryService, $product_id)
    {
        $categories = $categoryService->getAllCategories();

        $product = $this->getProductService()->getProduct($product_id);

        return view('backend.product.edit')->with([
            'product' => $product,
            'categories' => $categories
        ]);
    }


    public function update(Request $request, $product_id)
    {
        $response = $this->getProductService()->updateProduct($request, $product_id);

        return back()->with([
            'message' => $response
        ]);
    }

    public function destroy($product_id)
    {
        $this->getProductService()->deleteProduct($product_id);

        return back()->with([
            'message' => 'Ürün Basarıyla Silindi !',
        ]);
    }


    public function getProductVariants($product_id)
    {
        $variants = $this->getProductService()->getProductVariants($product_id);

        return view('backend.variant.index')->with([
            'variants' => $variants
        ]);

    }

    public function saveImageForProductAndImages(Request $request)
    {
        $product_id = $request->product_id;

        $variants = $this->getProductService()->getProductVariants($product_id);

        return view('backend.product.saveImagesForProductAndVariants')->with([
            'variants' => $variants
        ]);
    }

    public function getProductAttributesByProductId(Request $request)
    {
        $attributes = $this->productService->getProductAttributesByProductId($request->productId);

        return response()->json($attributes);
    }

}
