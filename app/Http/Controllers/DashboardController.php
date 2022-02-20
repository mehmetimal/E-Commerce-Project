<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $dasboardService;
    public function __construct()
    {
        $this->dasboardService=new DashboardService();
    }

    /**
     * @return DashboardService
     */
    public function getDasboardService(): DashboardService
    {
        return $this->dasboardService;
    }
    public  function index(){
        if (Auth::user()->hasRole('Admin|Super Admin')){

           $infos = $this->getDasboardService()->getInfoForAdmin();


            return view('backend.dashboard.admin')->with([
                'infos'=>$infos
            ]);

        }elseif(Auth::user()->hasRole('Shop')){

            return view('backend.dashboard.shop');
        }
    }
}
