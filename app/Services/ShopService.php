<?php


namespace App\Services;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopService
{
    public function getShopsByRole()
    {
        if (Auth::user()->hasRole(['Super Admin', 'Admin'])) {
            return $this->getAllShops();
        } else {
            return $this->getUserShop();
        }
    }

    public function getAllShops()
    {
        return Shop::with('user.detail')->get();
    }

    public function storeShopByType(Request $request)
    {



        $iyzicoService=new IyzicoService();

        $shop = Shop::create([
            'user_id' => $request->user_id,
            'nick_name' => $request->nick_name,
            'name' => $request->name,
        ]);


        $shop->addMedia($request->image)->toMediaCollection('shop_logos');

        if ($request->shop_type==1){
            $subMerchant= $iyzicoService->createPersonalShop($request,$shop->id);
        }elseif ($request->shop_type == 2){
            $subMerchant = $iyzicoService->createPrivateShop($shop->id);
        }elseif($request->shop_type == 3){
            $subMerchant= $iyzicoService->createLimitedShop($shop->id);
        }else{
            dd('invalid Shop_type');
        }
        dd($subMerchant);
    }

    public function getShop($shop_id)
    {
        return Shop::findOrFail($shop_id);
    }

    public function updateShop(Request $request, $shop_id)
    {
        $shop = Shop::findOrFail($shop_id);

        $shop->update([
            'nick_name' => $request->nick_name,
            'name' => $request->name,
        ]);
        if ($request->has('image')) {
            $shop->addMedia($request->image)->toMediaCollection('shop_logos');

        }

    }

    public function getUserShop()
    {
        return Shop::where('user_id', Auth::id())->first();
    }





}
