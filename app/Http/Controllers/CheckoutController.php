<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public  function index(){
if (!\Cart::count() >0){
    return back()->with([
        'error'=>'Sepetinizde Ürün Yok '
    ]);
}
        $provinces =Province::all();
        return view('frondend.checkout')->with([
            'provinces'=>$provinces
        ]);

    }
}
