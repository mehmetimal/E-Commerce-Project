<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/k_favicon_32x.png">
    <title>Moda Terapim | En ucuz En Moda E-Ticaret Platformu </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:300,300i,400,400i,500,500i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frondend/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/drift-basic.min.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/photoswipe.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/font-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/defined.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/home-default.css')}}">
    <link rel="stylesheet" href="{{asset('frondend/css/shop.css')}}">
    <script src="https://kit.fontawesome.com/3a2f25efb5.js" crossorigin="anonymous"></script>
@stack('css')
</head>
<body class="kalles-template single-product-template zoom_tp_2 header_full_true des_header_3 css_scrollbar lazy_icons btnt4_style_2 css_scrollbar template-index kalles_toolbar_true hover_img2 swatch_style_rounded swatch_list_size_small label_style_rounded wrapper_full_width header_full_true hide_scrolld_true lazyload">
<style>
    .error {
        color: #F00;
        background-color: #FFF;
    }
</style>
<!--head banner-->
    <div id="kalles-section-header_banner" class="kalles-section-header_banner">
    <div class="h__banner bgp pt__10 pb__10 fs__14 flex fl_center al_center pr oh show_icon_false">
        <div class="container">
            <div class="row al_center">
                <div class="col-auto op__0">
                    <a href="#" class="h_banner_close pr pl__10 cw z_index">Kapat</a>
                </div>
                <a href="{{route('get.site.ratings')}}" class="pa t__0 l__0 r__0 b__0 z_100"></a>
                <div class="col h_banner_wrap tc cw">Sizlerle <strong>Büyüyoruz  </strong>. Sizden Önceki Müşterilerimiz Hakkımızda Ne Dediler ?
                  Gör Kendin İkna Ol ->
                    <i class="las la-arrow-right"></i></div>
                <div class="col-auto">
                    <a href="#" class="h_banner_close pr pl__10 cw z_100">Kapat </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end head banner-->

<div id="nt_wrapper">

  @include('frondend.layouts.header')

    <div id="nt_content">

       @if(Request::is('/') ||Request::is('checkout')|| Request::is('iletisim'))
           @include('frondend.layouts.rootCategories')
       @endif

        <!--shop banner-->
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh cat_bg_img page_head_">
                <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="{{asset('images/shop-banner.jpg')}}"></div>
                <div class="container pr z_100">
                    <h1 class="mb__5 cw">@yield('banner_title','Hosgeldiniz')</h1>
                    <p class="mg__0">@yield('banner_text','İstediğiniz Ürünü sadece 2 tıkla sepetinize ekleyebilir ,Aradıgınız Ürünü "Filtrele"  me bölümünden bulabilirsiniz') </p>
                </div>
            </div>
        </div>
        <!--end shop banner-->

        @yield('content')

    </div>

   @include('frondend.layouts.footer')

</div>

<!--mask overlay-->
<div class="mask-overlay ntpf t__0 r__0 l__0 b__0 op__0 pe_none"></div>
<!--end mask overlay-->

@include('frondend.layouts.quickView')

{{--@include('frondend.layouts.quickShop')--}}

@include('frondend.layouts.miniCart')

{{--@include('frondend.layouts.searchBox')--}}

@include('frondend.layouts.loginBox')
<!-- mobile menu -->
<div id="nt_menu_canvas" class="nt_fk_canvas nt_sleft dn lazyload">
    <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
</div>
<!-- end mobile menu -->
@include('frondend.layouts.mobileToolbar')

{{--@include('frondend.layouts.mobileMenu')--}}

<!-- back to top button-->
<a id="nt_backtop" class="pf br__50 z__100 des_bt1" href="#"><span class="tc br__50 db cw"><i class="pr pegk pe-7s-angle-up"></i></span></a>
<a id="nt_backtop" class="pf br__50 z__100 des_bt1" href="#"><span class="tc br__50 db cw"><i class="pr pegk pe-7s-angle-up"></i></span></a>

<script src="{{asset('frondend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('frondend/js/nouislider.min.js')}}"></script>
<script src="{{asset('frondend/js/jarallax.min.js')}}"></script>
<script src="{{asset('frondend/js/packery.pkgd.min.js')}}"></script>
<script src="{{asset('frondend/js/jquery.hoverIntent.min.js')}}"></script>
<script src="{{asset('frondend/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('frondend/js/flickity.pkgd.min.js')}}"></script>
<script src="{{asset('frondend/js/lazysizes.min.js')}}"></script>
<script src="{{asset('frondend/js/js-cookie.min.js')}}"></script>
<script src="{{asset('frondend/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frondend/js/photoswipe.min.js')}}"></script>
<script src="{{asset('frondend/js/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('frondend/js/drift.min.js')}}"></script>
<script src="{{asset('frondend/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frondend/js/resize-sensor.min.js')}}"></script>
<script src="{{asset('frondend/js/theia-sticky-sidebar.min.js')}}"></script>
<script src="{{asset('frondend/js/interface.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@include('frondend.layouts.modals.site_ratings')
@include('frondend.layouts.modals.distance_sales_contract')
@include('frondend.layouts.modals.return-exchange')
@include('frondend.layouts.modals.privacy')
@stack('js')
<script>
        $("#RegisterForm").validate({
            rules: {
                password:{
                    required:true,
                    min:8
                } ,
                email: {
                    required: true,
                    email: true
                },
                password_confirmation: {
                    equalTo: "#password"
                }
            },
            messages: {
                password:{
                  required:"Şifre alanı Boş olamaz",
                  min:"Şire Minimum 8 Karakter Olmalı "
                } ,
                email: {
                    required: "Sipariş takibi için email adresiniz gereklidir" ,
                    email: "Lütfen email formatında bir değer giriniz name@domain.com"
                },
                password_confirmation:{
                    equalTo:"Şifre Tekrarı İle Şifre Uyuşmuyor "
                }
            }
        });
</script>
@if(\Illuminate\Support\Facades\Session::has('message'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{\Illuminate\Support\Facades\Session::get('message')}}',
            showConfirmButton: false,
            timer: 1500
        })
</script>

@endif
@if(\Illuminate\Support\Facades\Session::has('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '{{\Illuminate\Support\Facades\Session::get('error')}}',
            showConfirmButton: true,

        })
    </script>

@endif
@if(\Illuminate\Support\Facades\Session::has('status'))
<script>


        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{\Illuminate\Support\Facades\Session::get('status')}}',
        showConfirmButton: false,
        timer: 1500
    })



</script>
@endif
@if(\Illuminate\Support\Facades\Session::has('order_success'))
<script>
    Swal.fire({
        title: '<strong>Sipariş  <u>Başarılı :)</u></strong>',
        icon: 'info',
        html:
            'Sipariş Kodun <b>{{session('order')}}</b>, ' +

            'Üye Olmadıgığın İçin Siparişinin Durumunu <a href="https://wa.me/{{$site_setting->phone}}?text=Merhaba%20Siparişim%20Hakkında%20Bilgi%20Almak%20İstiyorum">Buraya Tıklayarak </a> Bize Sorabilirsin,Üye Olmak İçin Kullanığın E mail Adresinin şifresni değiştirip Üye Olabilir Bu zahmetten Kurutulabilirsin :) İyi Günlerde Kullan ',
        showCloseButton: true,

        focusConfirm: false,
        confirmButtonText:
            '<i class="fa fa-thumbs-up"></i> Tamamdır !',
        confirmButtonAriaLabel: 'Thumbs up, great!',

    })
</script>
@endif



</body>
</html>
