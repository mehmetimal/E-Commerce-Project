<?php


namespace App\Services;


use App\Models\Product;
use App\Models\WholeSale;
use Illuminate\Support\Facades\Auth;

class WholeSaleService
{
public  function getWholeSales(){
    return WholeSale::with('product')->get();
}
public  function storeWholeSale($product_id,$price,$description){


    WholeSale::create([
        'product_id'=>$product_id,
        'price'=>$price,
        'description'=>$description,
    ]);
}

public  function getWholeSaleProduct($whole_sale_id){
    return WholeSale::whereHas('product.shop',function ($shopQuery){
        $shopQuery->where('user_id',Auth::id());
    })->with('product')->findOrFail($whole_sale_id);
}


public  function updateWholeSale($price,$description,$whole_sale_id){

    WholeSale::whereHas('product.shop',function ($shopQuery){
        $shopQuery->where('user_id',Auth::id());
    })->findOrFail($whole_sale_id)->update([
        'price'=>$price,
        'description'=>$description
    ]);
}
public  function deleteWholeSale($whole_sale_id){
    WholeSale::whereHas('product.shop',function ($shopQuery){
        $shopQuery->where('user_id',Auth::id());
    })->destroy($whole_sale_id);
}

}
