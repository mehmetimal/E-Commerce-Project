<?php

namespace App\Http\Controllers;

use App\Http\Requests\order\UpdateOrderRequest;
use App\Models\Order;
use App\Services\IyzicoService;
use App\Services\OrderService;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService;
    public function __construct()
    {
        $this->middleware('permission:Read Order')->only('index', 'show');
        $this->middleware('permission:Update Order')->only('edit', 'update');

        $this->orderService=new OrderService();
    }

    /**
     * @return OrderService
     */
    public function getOrderService(): OrderService
    {
        return $this->orderService;
    }

    public function index()
    {
        $orders =$this->getOrderService()->getOrders();
        return  view('backend.order.index')->with([
            'orders'=>$orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }


    public function edit( $order_id)
    {
       $order = $this->getOrderService()->getOrderDetail($order_id);
    return view('backend.order.edit')->with([
        'order'=>$order,
        'orderStatus'=>Order::$orderStatus,
    ]);
    }

    public function update(UpdateOrderRequest $request,  $order_id)
    {
        $this->getOrderService()->updateOrder($request->status,$order_id);
        return back()->with([
            'message'=>'Sipariş Durumu Güncellendi',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public  function approveItem(IyzicoService $iyzicoService,$transaction_id){

        $result = $iyzicoService->approveItem($transaction_id);

        if ($result){
            return back()->with([
                'message'=>'Ürün Onaylandı !',
            ]);
        }
    }
}
