@extends('frondend.layouts.app')
@section('banner_title', 'Yorumlarımız')
@section('banner_text','Bizden Daha Önce ALışveriş Yapan Kişiler Hakkımızda ne mi dediler ? İşte Bazıları')
@section('content')

    <div class="container cb">
        <div id="kalles-section-faqs" class="kalles-section nt_section type_faq js_faq_ad mt__50 mb__50">
            <div class="kalles-tabs sp-tabs">
                @foreach($comments  as  $index=>$comment)

                    <div class="panel entry-content sp-tab des_mb_2 des_style_2 dn" id="tab_faqs-{{$index}}">
                        <div class="js_ck_view"></div>
                        <div class="heading bgbl dn">
                            <a class="tab-heading flex al_center fl_between pr cd chp fwm" href="#tab_faqs-{{$index}}"><span class="txt_h_tab">{{$comment->name}} - {{$comment->surname }}</span><span class="nav_link_icon ml__5"></span></a>
                        </div>
                        <div class="sp-tab-content">
                            <p class="mb-2">{{$comment->comment}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
