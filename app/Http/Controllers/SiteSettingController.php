<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Read Settings')->only('index','show');
        $this->middleware('permission:Update Settings')->only('update','edit');
    }

    public function index(){
       $site_setting = SiteSetting::find(1);

    return view('backend.site_setting.index')->with([
        'site_settings'=>$site_setting
    ]);
    }
    public  function update(Request $request,$id){
        $siteSetting=SiteSetting::find($id);

      $siteSetting->update($request->except('_token'));
        if ($request->hasFile('logo')){
            $siteSetting->addMedia($request->logo)->toMediaCollection('site_logo');
        }
        return back()
            ->with( [
                'message'=>'Guncelleme Basarılı '
            ] );
    }
}
