<?php

namespace App\Http\Controllers;



use App\Models\Order;
use App\Models\SiteSetting;
use App\Models\Variant;
use App\Services\PlaceOrderService;


use Dflydev\DotAccessData\Data;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PlaceOrderController extends Controller
{

    private $placeOrderService ;
    public function __construct()
    {

        $this->placeOrderService = new PlaceOrderService();

    }

    /**
     * @return PlaceOrderService
     */
    public function getPlaceOrderService(): PlaceOrderService
    {
        return $this->placeOrderService;
    }

    public  function placeOrder(Request $request)
    {
        $request->flash();

        $price = $this->getPlaceOrderService()->calculateCartPrice();


        $hasAddress = $request->has('user_address') ;

        $userAddressEmailAndId = $this->getPlaceOrderService()->getBuyerAddressAndId($hasAddress,$request->user_address,$request->address_user_name,$request->address_user_surname,$request->address_user_phone,$request->address_user_description,$request->address_user_province,$request->address_user_district,$request->user_email);

        $address = json_decode(json_encode($userAddressEmailAndId->address));

        $basket_id= $this->getPlaceOrderService()->fillBasket($userAddressEmailAndId->user_id);


        $response  =  $this->getPlaceOrderService()->processVariantIsAllReadyAviable();

       if ($response){
           return back()->with([
               'error'=>$response,
           ]
           );
       }


        if ($request->payment_method  ==  Order::$PAY_FROM_HOME){

          $order  =  $this->getPlaceOrderService()->storeOrder($price,$address,$basket_id,Order::$PAY_FROM_HOME,null,null);

        }elseif($request->payment_method == Order::$CREDIT_CARD_PAYMENT){

           $order = $this->getPlaceOrderService()->placeOrderCredit(
                $price,
                $basket_id,
                $request->payment_card_owner,
                $request->payment_card_number,
                $request->payment_card_expire_date_month,
                $request->payment_card_expire_date_year,
                $request->payment_card_cvc,
                $address,
                $userAddressEmailAndId->user_id,
                $userAddressEmailAndId->email);
        }else{
            dd('invalid Payment Type ');
        }
if(isset($order->id)){

    \Cart::destroy();
    if (Auth::check()){
        return redirect()->route('profile')->with([
            'message'=>'Sipariş Tarafımıza Ulaştı'
        ]);
    }else{
        return redirect()->route('index')->with([
            'order'=>$order->id,
            'order_success'=>'Siparişiniz Tarafımıza Başarıyla Ulaştı'
        ]);
    }
}else{
    return back()->with([
        'error'=>$order
    ]);
}

    }
}
