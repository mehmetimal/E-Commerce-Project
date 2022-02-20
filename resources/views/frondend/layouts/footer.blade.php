<!-- footer -->
<footer id="nt_footer" class="bgbl footer-1">
    <div id="kalles-section-footer_top" class="kalles-section footer__top type_instagram">
        <div class="footer__top_wrap footer_sticky_false footer_collapse_true nt_bg_overlay pr oh pb__30 pt__80">
            <div class="container pr z_100">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-12 mb__50 order-lg-2 order-1">
                        <div class="widget widget_nav_menu">
                            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30">
                                <span class="txt_title">Ana Kategoriler </span>
                                <span class="nav_link_icon ml__5"></span>
                            </h3>
                            <div class="menu_footer widget_footer">
                                <ul class="menu">

                                    @foreach($root_categories as $category)
                                        <li class="menu-item">
                                            <a href="{{route('shopping',$category->id)}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-12 mb__50 order-lg-1 order-1">
                        <div class="widget widget_nav_menu">
                            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30">
                                <span class="txt_title">Menü </span>
                                <span class="nav_link_icon ml__5"></span>
                            </h3>
                            <div class="menu_footer widget_footer">
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="{{route('index')}}">Anasayfa</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('about')}}">Hakkımızda </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('get.whole_sales')}}">Toptan Satış </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('get.all.partners')}}">Ortaklarımız</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#"  data-toggle="modal" data-target="#site_rating"   >Bizi Yorumlayın :)</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb__50 order-lg-1 order-1">
                        <div class="widget widget_text widget_logo">
                            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30 dn_md">
                                <span class="txt_title">Bize Ulaşın</span>
                                <span class="nav_link_icon ml__5"></span>
                            </h3>
                            <div class="widget_footer">
                                <div class="footer-contact">
                                    <p>
                                        <a class="d-block" href="{{route('index')}}">
                                            <img class="w__100 mb__15 lazyload max-width__95px" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%20220%2066%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" alt="Kalles Template" data-src="{{$site_setting->getFirstMediaUrl('site_logo','big')}}">
                                        </a>
                                    </p>
                                    <p>
                                        <i class="pegk pe-7s-map-marker"> </i><span>{{$site_setting->address}}</span></span>
                                    </p>
                                    <p><i class="pegk pe-7s-mail"></i>
                                        <span><a href="#">{{$site_setting->email}}</a></span>
                                    </p>
                                    <p><i class="pegk pe-7s-call"></i> <span>{{$site_setting->phone}} </span></p>
                                    <div class="nt-social">
                                        <a href="https://wa.me/{{$site_setting->phone}}?text=Merhaba%20Bir%20Konuda%20Bilgi%20Almak%20İstiyorum" class="facebook cb ttip_nt tooltip_top">
                                            <span class="tt_txt">WhatsApp</span>
                                            <i class="facl facl-whatsapp"></i>
                                        </a>
                                        <a href="{{$site_setting->facebook}}" class="facebook cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Facebook</span>
                                            <i class="facl facl-facebook"></i>
                                        </a>
                                        <a href="#" class="twitter cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Twitter</span>
                                            <i class="facl facl-twitter"></i>
                                        </a>
                                        <a href="{{$site_setting->instagram}}" class="instagram cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Instagram</span>
                                            <i class="facl facl-instagram"></i>
                                        </a>
                                        {{--<a href="https://www.linkedin.com" class="linkedin cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Follow on Linkedin</span>
                                            <i class="facl facl-linkedin"></i>
                                        </a>--}}
                                        <a href="{{$site_setting->pinterest}}" class="pinterest cb ttip_nt tooltip_top">
                                            <span class="tt_txt">Pinterest Hesabımız </span>
                                            <i class="facl facl-pinterest"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-2 col-md-6 col-12 mb__50 order-lg-3 order-1">
                        <div class="widget widget_nav_menu">
                            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30">
                                <span class="txt_title">Bilgilendirmeler </span>
                                <span class="nav_link_icon ml__5"></span>
                            </h3>
                            <div class="menu_footer widget_footer">
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="{{route('about')}}">Hakkımızda </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{route('contact')}}">İletişim</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" data-toggle="modal" data-target="#withdrawal">İade  &amp; Değişim</a>
                                    </li>
                                    <li class="menu-item">
                                        <a data-toggle="modal" data-target="#distance_sales_contract" href="#">Mesafeli Satış Sözleşmesi</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#"  data-toggle="modal" data-target="#privacy">Gizlilik Sözleşmesi</a>
                                    </li>

                                    {{--<li class="menu-item">
                                        <a href="privacy-policy.html">Privacy Policy</a>
                                    </li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-12 mb__50 order-lg-4 order-1">
                        <div class="widget widget_nav_menu">
                            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30">
                                <span class="txt_title">Faydalı Linkler </span>
                                <span class="nav_link_icon ml__5"></span>
                            </h3>
                            <div class="menu_footer widget_footer">
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="{{route('index')}}">Anasayfa</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Site Haritası</a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="{{route('faqs')}}">Sıkça Sorulan Sorular </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Profilim</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="kalles-section-footer_bot" class="kalles-section footer__bot">
        <div class="footer__bot_wrap pt__20 pb__20">
            <div class="container pr tc">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12 col_1">Copyright © 2021
                        <span class="cp">Mehmet İMAL</span> Tüm Hakları Saklıdır  </div>
                    <div class="col-lg-6 col-md-12 col-12 col_2">
                        <ul id="footer-menu" class="clearfix">
                            <li class="menu-item">
                                <a href="{{route('index')}}"></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('about')}}">Hakkımızda</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('contact')}}">İletişim</a>
                            </li>
                           {{-- <li class="menu-item">
                                <a href="blog-grid.html">Blog</a>
                            </li>--}}
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <img src="{{asset('images/iyzico_footer.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
