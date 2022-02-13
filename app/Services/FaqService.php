<?php


namespace App\Services;


use App\Models\Faq;

class FaqService
{
    public  function getFaqs(){
        return Faq::all();
    }
    public  function storeFaq($question,$answer){
        Faq::create([
            'question'=>$question,
            'answer'=>$answer,
        ]);
    }

}
