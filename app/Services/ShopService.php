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

        if ($request->shop_type==Shop::$PERSONAL_SHOP){
           return  $iyzicoService->createPersonalShop(
                $request->user_id,$request->nick_name,
                $request->name,$request->image,$request->address,
                $request->Iban,$request->IdentityNumber,
                $request->commission_rate);
        }elseif ($request->shop_type == Shop::$PRIVATE_SHOP){

            return $iyzicoService->createPrivateShop(
                $request->user_id,
                $request->nick_name,
                $request->name,$request->image,$request->address,
                $request->Iban,$request->IdentityNumber,
                $request->commission_rate,
                $request->taxOffice,
                $request->legalCompanyName

            );
        }elseif($request->shop_type == Shop::$LIMITED_SHOP){

           return  $iyzicoService->createLimitedShop(
                $request->user_id,
                $request->nick_name,
                $request->name,
                $request->image,
                $request->address,
                $request->Iban,
                $request->commission_rate,
                $request->legalCompanyName,
                $request->taxNumber,
                $request->taxOffice
            );
        }else{
            dd('invalid Shop_type');
        }

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
