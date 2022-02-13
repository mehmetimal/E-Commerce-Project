<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profileService ;
    public function __construct()
    {
        $this->profileService=new ProfileService ();

    }

    /**
     * @return ProfileService
     */
    public function getProfileService(): ProfileService
    {
        return $this->profileService;
    }

    public function index(){


        $orders = $this->getProfileService()->getOrders();
        return view('frondend.profile.index')->with([
            'orders'=>$orders
        ]);
    }
    public  function orderDetail($order_id){
        $orderWithDetails = $this->getProfileService()->getOrderDetail($order_id);

    return view('frondend.profile.orderDetail')->with(
        [
            'orderWithDetails'=>$orderWithDetails,
       ]
    );

    }
}
