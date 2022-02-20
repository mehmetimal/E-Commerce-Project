<?php


namespace App\Services;


use App\Models\Order;

class OrderService
{

    public function getOrders(){
        return Order::orderBy('created_at')->get();
    }
public  function getOrderDetail($order_id){
    return Order::with('basket','basket.items')->find($order_id);
}
public  function updateOrder($status,$order_id){
        Order::find($order_id)->update([
            'state'=>$status
        ]);
}
}
