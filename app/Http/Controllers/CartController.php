<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\CategoryService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    private $cartService;
    public  function __construct()
    {
        $this->cartService=new CartService();
    }

    /**
     * @return CartService
     */
    public function getCartService(): CartService
    {
        return $this->cartService;
    }

    public function addItem(Request $request){


        $this->getCartService()->addItem($request->barcode,$request->name,$request->quantity,$request->price,$request->product_name,$request->image,$request->max_quantity);


        $cart=Cart::content();

        return view('frondend.layouts.CartItems')->with([
            'cart'=>$cart,

        ]);
    }

    public function deleteItem(Request $request){
        Cart::remove($request->rowId);
    }
    public function getCartTotal(){

        $subTotal=Cart::subTotal();

        return response()->json($subTotal);
    }

    public  function updateCart(Request $request){


        Cart::update($request->rowId, $request->quantity);

    }
}
