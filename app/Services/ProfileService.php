<?php


namespace App\Services;


use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
public  function getOrders()
{


    return Order::whereHas('basket', function ($basketQuery) {
        $basketQuery->with('items')->where('user_id', Auth::id());
    })->get();

}
public  function getOrderDetail($order_id){

    return Order::whereHas('basket', function ($basketQuery) {
        $basketQuery->with('items')->where('user_id', 1);
    })->findOrFail($order_id);
}
}

