<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Shop;
use App\Models\SiteSetting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $site_settings =SiteSetting::find(1);
        $rootCategories  = Category::where('parent_id',null)->get();
        $shops =Shop::with('media')->get();
        view()->share('site_setting',$site_settings );
        view()->share('root_categories',$rootCategories );
        view()->share('shops',$shops );

    }
}
