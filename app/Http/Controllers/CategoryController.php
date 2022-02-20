<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\AttributeService;
use App\Services\CategoryService;
use Illuminate\Http\Request;


class CategoryController extends Controller
{


    private $categoryService;

    public function __construct()
    {
        $this->middleware('permission:Read Category')->only('index', 'show');
        $this->middleware('permission:Create Category')->only('create','store');
        $this->middleware('permission:Update Category')->only('update','edit','isAttributeSlugExists','isAttributeValueExists','getAttributesWithValues');
        $this->middleware('permission:Delete Category')->only('destroy');
        $this->categoryService = new CategoryService();
    }

    /**
     * @return CategoryService
     */
    public function getCategoryService(): CategoryService
    {
        return $this->categoryService;
    }

    public function index()
    {
        $categories = $this->getCategoryService()->getAllCategories();

        return view('backend.category.index')->with([
            'categories' => $categories,
        ]);
    }


    public function create(AttributeService $attributeService)
    {
        $attributes = $attributeService->getAllAttributes();
        $categories = $this->getCategoryService()->getAllCategories();

        return view('backend.category.create')->with([
            'categories' => $categories,
            'attributes' => $attributes,
        ]);
    }


    public function store(Request $request)
    {
        $request->flash();

        $response = $this->getCategoryService()->store($request);

        return back()->with([
            'message' => $response,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(AttributeService $attributeService, $id)
    {

        $category = $this->getCategoryService()->getCategoryInfoWithAttributes($id);

        $categories = $this->getCategoryService()->getAllCategories();

        $attributes = $attributeService->getAllAttributes();

        return view('backend.category.edit')->with([
            'category' => $category,
            'categories' => $categories,
            'attributes' => $attributes,

        ]);
    }


    public function update(Request $request, $id)
    {


        $this->getCategoryService()->updateCategory($request, $id);


        return back()->with([
            'message' => 'Kategori Guncellendi !',
        ]);
    }


    public function destroy($id)
    {
        $this->getCategoryService()->deleteCategory($id);


        return back()->with([
            'message' => 'Kategori Başarıyla Silindi '
        ]);
    }

    public function getCategoryInfoWithAttributes(Request $request)
    {

        $category_id = $request->categoryId;
        $attributes = $this->getCategoryService()->getCategoryInfoWithAttributes($category_id);

        return response()->json($attributes);
    }

    public function getCategoryAttributes(Request $request)
    {

        $attributes = $this->getCategoryService()->getCategoryAttributes($request->categoryId);

        return response()->json($attributes);
    }

    public function getRootDescants(Request $request){
        $categories = Category::whereDescendantOf($request->categoryId)->withDepth()->having('depth', '=', $request->depth  )->get();
        return response()->json($categories);
    }
    public function foo(Request $request){
        $categories = Category::whereDescendantOf($request->categoryId)->hasChildren()->get();
        return response()->json($categories);
    }
}
