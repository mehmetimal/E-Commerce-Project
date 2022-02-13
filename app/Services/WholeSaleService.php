<?php


namespace App\Services;


use App\Models\WholeSale;

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
    return WholeSale::with('product')->findOrFail($whole_sale_id);
}


public  function updateWholeSale($price,$description,$whole_sale_id){

    WholeSale::findOrFail($whole_sale_id)->update([
        'price'=>$price,
        'description'=>$description
    ]);
}
public  function deleteWholeSale($whole_sale_id){
    WholeSale::destroy($whole_sale_id);
}

}
