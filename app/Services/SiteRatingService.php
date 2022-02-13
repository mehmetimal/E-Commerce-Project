<?php


namespace App\Services;


use App\Models\SiteRating;

class SiteRatingService
{
    public  function getSiteComments(){
        return SiteRating::all();
    }

}
