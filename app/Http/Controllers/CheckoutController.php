<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public  function index(){

        $provinces =Province::all();
        return view('frondend.checkout')->with([
            'provinces'=>$provinces
        ]);
    }
}
