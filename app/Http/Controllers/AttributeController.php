<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Services\AttributeService;
use App\Services\AttributeValueService;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

    private $attributeService;
    public function __construct()
    {
        $this->middleware('permission:Read Attribute')->only('index', 'show');
        $this->middleware('permission:Create Attribute')->only('create','store');
        $this->middleware('permission:Update Attribute')->only('update','edit','isAttributeSlugExists','isAttributeValueExists','getAttributesWithValues');
        $this->middleware('permission:Delete Attribute')->only('destroy');
        $this->attributeService=new AttributeService();
    }

    /**
     * @return AttributeService
     */
    public function getAttributeService(): AttributeService
    {
        return $this->attributeService;
    }

    public function index()
    {
        $attributes=$this->getAttributeService()->getAllAttributes();
        return view('backend.attribute.index')->with([
            'attributes'=>$attributes,
        ]);
    }


    public function create()
    {
        return view('backend.attribute.create');
    }


    public function store(AttributeValueService  $attributeValueService,Request $request)
    {

         $this->getAttributeService()->storeAttribute($request);
         $attributeValueService->storeAttributeValue($request->name,$request->values);

          return back()->with([
              'message'=>'Özellik Basarıyla Eklendi !'
          ]);
    }

    public function show(Request $request)
    {


        $attribute = $this->getAttributeService()->getAttribute($request->attribute_id);

         return response()->json($attribute);
    }

    public function edit($attribute_id)
    {
        $attributeWithValues = $this->getAttributeService()->getAttribute($attribute_id);

        return view('backend.attribute.edit')->with([
            'attributeWithValues'=>$attributeWithValues,
        ]);


    }

    public function update(Request $request)
    {

        $response = $this->getAttributeService()->updateAttribute($request->oldAttributeName,$request->attributeName);

        return response()->json($response);
    }

    public function destroy($attribute_id)
    {
        $this->getAttributeService()->deleteAttribute($attribute_id);
        return back()->with([
            'message'=>'Özellik  Silindi '
        ]);
    }

    public  function isAttributeSlugExists(Request $request){
       $isExists = $this->getAttributeService()->isAttributeSlugExists($request);

       return response()->json($isExists);
    }

    public function isAttributeValueExists(Request $request)
    {
       $isExists = $this->getAttributeService()->isAttributeValueExists($request);

       return response()->json($isExists);
    }

    public  function getAttributesWithValues(Request $request){

        $attributeWithValues = $this->getAttributeService()->getAttributesWithValues($request->attributeIds);

        return response()->json($attributeWithValues);
    }
}
