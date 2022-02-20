<?php

namespace App\Http\Controllers;

use App\Http\Requests\shop\StoreShopRequest;
use App\Models\Shop;
use App\Models\User;
use App\Services\ShopService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ShopController extends Controller
{

    private  $shopService ;


    public function __construct()
    {
        $this->middleware('permission:Read Shop')->only('index', 'show');
        $this->middleware('permission:Create Shop')->only('create','store');
        $this->middleware('permission:Update Shop')->only('update','edit');
        $this->middleware('permission:Delete Shop')->only('destroy');
        $this->shopService=new ShopService();
    }

    /**
     * @return ShopService
     */
    public function getShopService(): ShopService
    {
        return $this->shopService;
    }

    public function index()
    {
        $shops = $this->getShopService()->getAllShops();

        return view('backend.shop.index')->with([
            'shops'=>$shops
        ]);
    }


    public function create(UserService $userService)
    {
        $shop_type = \request()->input('shop_type');

        $users=$userService->getAllShops();


        if ($shop_type == Shop::$PERSONAL_SHOP){

            return view('backend.shop.createShopByType.personalShop')->with([
                'users'=>$users
            ]);
        }elseif ($shop_type == Shop::$PRIVATE_SHOP){
            return view('backend.shop.createShopByType.privateShop')->with([
                'users'=>$users
            ]);
        }elseif ($shop_type == Shop::$LIMITED_SHOP){
            return view('backend.shop.createShopByType.limitedShop')->with([
                'users'=>$users
            ]);
        }



    }


    public function store(StoreShopRequest $request)
    {

        $user = User::with('detail')->find($request->user_id);

        if (!isset($user->detail) || !$user->detail->name || !$user->detail->surname || !$user->detail->phone){
            return back()->with([
                'error'=>'Kullanıcı Bilgileri Eksik Önce doldurun'
            ]);
        }

        $response = $this->getShopService()->storeShopByType($request);
        if ($response){
            return back()->with([
                'message'=>'Dükkan Başarıyla Eklendi !'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    public function edit( $shop_id)
    {
       $shop = $this->getShopService()->getShop($shop_id);
    return view('backend.shop.edit')->with([
        'shop'=>$shop
    ]);
    }

    function update(Request $request,  $shop_id)
    {
        $this->getShopService()->updateShop($request,$shop_id);

    return back()->with([
        'message'=>'Dükkan Basarıyla Güncellendi '
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
