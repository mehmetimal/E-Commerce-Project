<?php


namespace App\Services;


use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use App\Models\Variant;

class DashboardService
{



    public function getInfoForAdmin(){

      $info['order_count']   = Order::count();
      $info['product_count'] = Product::count();
      $info['user_count']    =User::count();
      $info['shop_count'] = Shop::count();
      $info['non_published_variants'] = Variant::where('is_published',0)->count();
      $info['published_variants'] = Variant::where('is_published',1)->count();
      $info['non_published_ratings'] = Variant::where('is_published',0)->count();

        return $info;
    }
}
