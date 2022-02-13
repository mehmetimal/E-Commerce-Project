<?php

namespace App\Http\Controllers;

use App\Models\SiteRating;
use App\Services\SiteRatingService;
use Illuminate\Http\Request;

class SiteRatingController extends Controller
{
    private $siteRatingService;
    public  function __construct()
    {
        $this->middleware('role:Super Admin|Admin')->only('index,updateIsPublished');
        $this->siteRatingService=new SiteRatingService();
    }

    /**
     * @return SiteRatingService
     */
    public function getSiteRatingService(): SiteRatingService
    {
        return $this->siteRatingService;
    }

    public function index(){

       $comments = $this->getSiteRatingService()->getSiteComments();
    return view('backend.siteRating.index')->with([
        'comments'=>$comments
    ]);
    }
    public function updateIsPublished($comment_id,$is_published){
            SiteRating::where('id',$comment_id)->update([
                'is_published'=>!$is_published
            ]);
            return back()->with([
                'message'=>'Yorum Onayı Değişti'
            ]);
    }

}
