<?php

namespace App\Http\Controllers;

use App\Http\Requests\attributeValue\AttributeValueStoreRequest;
use App\Models\AttributeValue;
use App\Services\AttributeService;
use App\Services\AttributeValueService;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{

    private $attributeValueService;
    public  function  __construct()
    {
        $this->middleware('permission:Read AttributeValue')->only('index', 'show');
        $this->middleware('permission:Create AttributeValue')->only('create','store');
        $this->attributeValueService=new AttributeValueService();
    }

    /**
     * @return AttributeService
     */
    public function getAttributeValueService(): AttributeValueService
    {
        return $this->attributeValueService;
    }

    public function store(AttributeValueStoreRequest $request)
    {
        $this->getAttributeValueService()->storeAttributeValue($request->name,$request->values);

       return back()->with([
           'message'=>'Güncelleme Başarılı ! '
       ]);
    }

    public function destroy($attributeValueId)
    {
        $this->getAttributeValueService()->deleteValue($attributeValueId);
        return back()->with([
            'message'=>'Özellik Değeri Silindi !',
        ]);
    }
}
