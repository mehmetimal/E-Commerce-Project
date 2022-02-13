<?php


namespace App\Services;


use Gloudemans\Shoppingcart\Facades\Cart;

class CartService
{

    public function addItem($barcode,$name,$quantity,$price,$product_name,$image,$max_quantity){
       $price  = ltrim($price, '₺');

        Cart::add(
            ['id' => $barcode, 'name' => $name, 'qty' => $quantity, 'price' => $price, 'weight' => 1, 'options' => ['product_name' => $product_name,'images'=>$image,'max_quantity'=>$max_quantity]]
        );

    }







}
