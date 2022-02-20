<?php

namespace App\Http\Controllers;

use App\Http\Requests\faq\StoreFaqRequest;
use App\Models\Faq;
use App\Services\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private $faqService;
    public  function __construct()
    {
        $this->faqService=new FaqService();
    }

    /**
     * @return FaqService
     */
    public function getFaqService(): FaqService
    {
        $this->middleware('permission:Read Faq')->only('index', 'show');
        $this->middleware('permission:Create Faq')->only('create','store');
        $this->middleware('permission:Update Faq')->only('update','edit','isAttributeSlugExists','isAttributeValueExists','getAttributesWithValues');
        $this->middleware('permission:Delete Faq')->only('destroy');
        return $this->faqService;
    }

    public function index()
    {
        $faqs = $this->getFaqService()->getFaqs();
        return view('backend.faq.index')->with([
            'faqs'=>$faqs
        ]);
    }

    public function create()
    {
        return  view('backend.faq.create');
    }


    public function store(StoreFaqRequest $request)
    {
        $this->getFaqService()->storeFaq($request->question,$request->answer);
        return back()->with([
            'message'=>'Soru Eklendi',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
