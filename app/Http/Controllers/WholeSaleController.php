<?php

namespace App\Http\Controllers;

use App\Models\WholeSale;
use App\Services\ProductService;
use App\Services\WholeSaleService;
use Illuminate\Http\Request;

class WholeSaleController extends Controller
{
    private  $wholeSaleService ;
    public  function  __construct()
    {
        $this->middleware('permission:Read Whole_Sale')->only('index', 'show');
        $this->middleware('permission:Create Whole_Sale')->only('create','store');
        $this->middleware('permission:Update Whole_Sale')->only('update','edit');
        $this->middleware('permission:Delete Whole_Sale')->only('destroy');
        $this->wholeSaleService=new WholeSaleService();
    }

    /**
     * @return WholeSaleService
     */
    public function getWholeSaleService(): WholeSaleService
    {
        return $this->wholeSaleService;
    }


    public function index()
    {
        $products = $this->getWholeSaleService()->getWholeSales();

        return view('backend.whole_sale.index')->with([
            'products'=>$products
        ]);
    }

    public function create(ProductService $productService)
    {
        $products = $productService->getAllProducts();
        return view('backend.whole_sale.create')->with([
            'products'=>$products,
        ]);
    }


    public function store(Request $request)
    {
        $this->getWholeSaleService()->storeWholeSale($request->product_id,$request->price,$request->description);
   return back()->with([
       'message'=>"Ürün Toptan Satışa Eklendi !"
   ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WholeSale  $wholeSale
     * @return \Illuminate\Http\Response
     */
    public function show(WholeSale $wholeSale)
    {
        //
    }


    public function edit($whole_sale_id)
    {
      $product =  $this->getWholeSaleService()->getWholeSaleProduct($whole_sale_id);

    return view('backend.whole_sale.edit')->with([
        'product'=>$product
    ]);
    }


    public function update(Request $request, $wholeSale_id)
    {
        $this->getWholeSaleService()->updateWholeSale($request->price,$request->description,$wholeSale_id);
    return back()->with([
        'message'=>'Ürün Başarıyla Güncellendi'
    ]);
    }


    public function destroy($wholeSale_id)
    {
        $this->getWholeSaleService()->deleteWholeSale($wholeSale_id);
    return back()->with([
      'message'=>'Ürün Toptan Satıstan Basarıyla Kaldırıldı !'
    ]);

    }
}
