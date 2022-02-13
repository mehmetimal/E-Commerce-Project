<?php


namespace App\Services;


use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryService
{

     public  function __construct()
     {

     }
 public function  getAllCategories(){


     $categories = Category::with('media')->get();

     return $categories;
 }

public function store(Request $request){

    $request->isSpecial == 'on' ? $request->isSpecial = 1 : $request->isSpecial = 0 ;

    //Girilen Kategori Var Mı Yok mu ?
    $categoryExists = $this->isCategorySlugExists(Str::slug($request->name));

    //Kategori Eğer Yoksa
    if (!$categoryExists){

        $categoryId = $this->saveCategory($request);


        //Kullanıcı Üst Kategori Seçti ise kategoriyi Alt Kategoriye Ekle
        if ($request->has('parent_id')) {

            $this->appendCategoryToRoot($request, $categoryId);
        }

        //Kullanıcı Resim Seçti ise Resim Ekle
        if ($request->has('image')) {
            $category = Category::find($categoryId);

            $category->addMedia($request->image)->toMediaCollection('categories');
        }

        return "Kategori Basarıyla Eklendi";
    }else{
        //Kategori Var İse Mesaj Dön

        return __( "message.category_exist");
    }

}
public  function isCategorySlugExists($slug){
     return Category::where('slug',$slug)->exists();
}
public  function saveCategory(Request $request){
    try {
        $category=Category::firstOrCreate(
            [
                'name' => $request->name,
                'slogan'=>$request->category_slogan,
                'isSpecial'=>$request->isSpecial,
            ]);


        $category->attributes()->attach($request->attribute_ids);
        return $category->id;

    }catch (\Exception $exception){
        return  $exception->getMessage();
    }


}
public  function appendCategoryToRoot($request, $categoryId){

    $category= Category::find($categoryId);
    try {
        $parentCategory=Category::findOrFail($request->parent_id);
        $parentCategory->appendNode($category);
    }catch (\Exception $exception){
        return $exception->getMessage();
    }
}
public  function getCategoryInfoWithAttributes($category_id){


   return  Category::with('media','attributes','ancestors')->findOrFail($category_id);


}
public  function updateCategory(Request $request,$category_id){


    $category = Category::findOrFail($category_id);

    $category->update([
        'name'=>$request->name,
        'slogan'=>$request->category_slogan,
        'isSpecial'=>$request->has('isSpecial'),
        'description'=>$request->description,

    ]);

    if ($request->has('parent_id') && $request->parent_id != null){
        $this->updateParentCategory($category_id,$request->parent_id);
    }
    $category->attributes()->sync($request->attribute_ids);

    if ($request->has('image')){
        $category->addMedia($request->image)->toMediaCollection('categories');
    }


}

    public  function updateParentCategory($category_id , $parent_id)
    {
        try {

            $node = Category::find($category_id);
            if ($parent_id == "root") {
                $node->makeRoot();
                return $node->save();
            }
            $parent = Category::find($parent_id);

            $node->appendToNode($parent)->save();

        } catch (\Exception $exception) {


        }
    }
    public function deleteCategory($category_id){

        try {
            $category = Category::with('attributes')->findOrFail($category_id);

            //todo : kategori üst kategori ise alt kategorilerin resimleri silinmiyor eklnecek
            return   $category->delete();

        }catch (\Exception $exception){

            return $exception->getMessage();
        }

    }
    public  function getCategoryAttributes($category_ids){


        return Attribute::whereHas('categories',function ($query) use($category_ids ){
            $query->whereIn('category_id',[$category_ids] );
        })->get();



    }
}
