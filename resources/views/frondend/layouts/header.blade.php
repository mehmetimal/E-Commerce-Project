<!-- header -->
<header style="height: 0" id="ntheader" class="ntheader header_3 h_icon_iccl ">
    <div class="kalles-header__wrapper ntheader_wrapper pr z_200">
        <div id="kalles-section-header_top">
            <div class="h__top bgbl pt__10 fs__12 flex fl_center al_center">
                <div class="container">
                    <div class="row al_center">
                        <div class="col-lg-4 col-12 tc tl_lg col-md-12 ">
                            <div class="header-text">
                                <i class="pegk pe-7s-call"></i> {{$site_setting->phone}} <i class="pegk pe-7s-mail ml__15"></i>
                                <a class="cg" href="#">{{$site_setting->email}}</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 tc col-md-12 ">
                            <div class="header-text">Size Daha İyi Hizmet Vermek İçin  <span class="cr">Sürekli Güncelleniyoruz</span>! <a href="{{$site_setting->instagram}}">Bizi Takipte Kalın </a></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="sp_header_mid" >
            <div class="header__mid">
                <div class="container">
                    <div class="row al_center css_h_se">

                        <div class="col-lg-2 col-md-4 col-6 tc tl_lg">
                            <div class=" branding ts__05 lh__1">
                                <a class="dib" href="{{route('index')}}">
                                    <img class="w__95 logo_normal dn db_lg" src="{{$site_setting->getFirstMediaUrl('site_logo','big')}}" alt="Moda Terapim ">
                                    <img class="w__100 logo_sticky dn" src="{{$site_setting->getFirstMediaUrl('site_logo','medium')}}" alt="Moda Terapim">
                                    <img class="w__100 logo_mobile dn_lg" src="{{$site_setting->getFirstMediaUrl('site_logo','small')}}" alt="Moda Terapim">
                                </a>
                            </div>
                        </div>
                        <div class="col dn db_lg">
                            <nav class="nt_navigation kl_navigation tc hover_side_up nav_arrow_false">
                                <ul id="nt_menu_id" class="nt_menu in_flex wrap al_center">
                                    <li class="type_mega menu_wid_cus menu-item has-children menu_has_offsets menu_center pos_center">
                                        <a class="lh__1 flex al_center pr" href="{{route('index')}}">Anasayfa</a>

                                        {{--<div class="cus sub-menu">
                                            <div class="container megamenu-content-1000px">
                                                <div class="row lazy_menu lazyload" data-jspackery='{ "itemSelector": ".sub-column-item","gutter": 0,"percentPosition": true,"originLeft": true }'>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="home-default.html">HOMEPAGES</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="home-default.html">Home Default
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-classic.html">Home Classic
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-video-banner.html">Home Video Banner</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-categories-links.html">Home Categories Links</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-static-image.html">Home Static Image</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-metro.html">Home Metro</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-lookbook.html">Home Lookbook</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-parallax.html">Home Parallax</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-instagram-shop.html">Home Instagram Shop</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-medical.html">Home Medical
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-flower.html">Home Flower</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-furniture.html">Home Furniture
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-bag.html">Home Bag</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-lingeries.html">Home Lingeries</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-cosmetics.html">Home Cosmetics
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-glasses.html">Home Glasses
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-shoes.html">Home Shoes
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="home-default.html">HOMEPAGES</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="home-fashion9.html">Home Fashion 9</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-lookbook-collection.html">Home Lookbook Collection</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-simple.html">Home Fashion Simple</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion10.html">Home Fashion 10</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-decor.html">Home Decor</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-decor2.html">Home Decor 2</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-vertical.html">Home Fashion Vertical</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric.html">Home Electric</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric-vertical.html">Home Electric Vertical</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-digital.html">Home Digital</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-one-product-store.html">One Product Store
                                                                    <span class="lbc_nav lb_menu_hot ml__5">hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-handmade.html">Home Handmade</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-trend.html">Home Fashion Trend</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-kids.html">Home Kids</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-sport.html">Home Sport
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-jewelry.html">Home Jewelry
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="home-default.html">Header Layouts</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="home-header-01.html">Header Layout 1</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-header-02.html">Header Layout 2</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-default.html">Header Layout 3</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-header-04.html">Header Layout 4</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric.html">Header Layout 5</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-header-06.html">Header Layout 6</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-vertical.html">Header Layout 7</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric-vertical.html">Header Layout 8</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-decor.html">Header Transparent</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="shop-filter-sidebar.html">FEATURES</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="shop-filter-options.html">Filter options
                                                                    <span class="lbc_nav lb_menu_hot ml__5">hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="index.html">Catalog mode</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop.html">Cookies law info</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-age-verified.html">Age verification</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-default.html">Mega menu</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-parallax.html">Footer sticky</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-right-sidebar.html">Right Sidebar</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-hidden-sidebar.html">Hidden sidebar</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="checkout.html">Checkout</a>
                                                            </li>

                                                            <li class="menu-item">
                                                                <a href="product-detail-frequently-bought-together.html">Frequently Bought Together</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="product-detail-variant-images-grouped.html">Variant Images Grouped</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-rtl.html">Demo RTL
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-grid-list-switcher.html">Grid/List switcher
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-shoes.html">Compare
                                                                    <span class="lbc_nav lb_menu_new ml__5">New</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="product-detail-pickup-availability.html">Pickup Availability
                                                                    <span class="lbc_nav lb_menu_selling-feature ml__5">Selling Feature</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </li>
                                    <li class="type_mega menu_wid_cus menu-item has-children menu_has_offsets menu_center pos_center">
                                        <a class="lh__1 flex al_center pr" href="{{route('get.site.ratings')}}">Yorumlar </a>

                                        {{--<div class="cus sub-menu">
                                            <div class="container megamenu-content-1000px">
                                                <div class="row lazy_menu lazyload" data-jspackery='{ "itemSelector": ".sub-column-item","gutter": 0,"percentPosition": true,"originLeft": true }'>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="home-default.html">HOMEPAGES</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="home-default.html">Home Default
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-classic.html">Home Classic
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-video-banner.html">Home Video Banner</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-categories-links.html">Home Categories Links</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-static-image.html">Home Static Image</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-metro.html">Home Metro</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-lookbook.html">Home Lookbook</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-parallax.html">Home Parallax</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-instagram-shop.html">Home Instagram Shop</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-medical.html">Home Medical
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-flower.html">Home Flower</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-furniture.html">Home Furniture
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-bag.html">Home Bag</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-lingeries.html">Home Lingeries</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-cosmetics.html">Home Cosmetics
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-glasses.html">Home Glasses
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-shoes.html">Home Shoes
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="home-default.html">HOMEPAGES</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="home-fashion9.html">Home Fashion 9</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-lookbook-collection.html">Home Lookbook Collection</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-simple.html">Home Fashion Simple</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion10.html">Home Fashion 10</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-decor.html">Home Decor</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-decor2.html">Home Decor 2</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-vertical.html">Home Fashion Vertical</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric.html">Home Electric</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric-vertical.html">Home Electric Vertical</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-digital.html">Home Digital</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-one-product-store.html">One Product Store
                                                                    <span class="lbc_nav lb_menu_hot ml__5">hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-handmade.html">Home Handmade</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-trend.html">Home Fashion Trend</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-kids.html">Home Kids</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-sport.html">Home Sport
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-jewelry.html">Home Jewelry
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="home-default.html">Header Layouts</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="home-header-01.html">Header Layout 1</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-header-02.html">Header Layout 2</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-default.html">Header Layout 3</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-header-04.html">Header Layout 4</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric.html">Header Layout 5</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-header-06.html">Header Layout 6</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-vertical.html">Header Layout 7</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric-vertical.html">Header Layout 8</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-decor.html">Header Transparent</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="shop-filter-sidebar.html">FEATURES</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="shop-filter-options.html">Filter options
                                                                    <span class="lbc_nav lb_menu_hot ml__5">hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="index.html">Catalog mode</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop.html">Cookies law info</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-age-verified.html">Age verification</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-default.html">Mega menu</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-parallax.html">Footer sticky</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-right-sidebar.html">Right Sidebar</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-hidden-sidebar.html">Hidden sidebar</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="checkout.html">Checkout</a>
                                                            </li>

                                                            <li class="menu-item">
                                                                <a href="product-detail-frequently-bought-together.html">Frequently Bought Together</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="product-detail-variant-images-grouped.html">Variant Images Grouped</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-rtl.html">Demo RTL
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-grid-list-switcher.html">Grid/List switcher
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-shoes.html">Compare
                                                                    <span class="lbc_nav lb_menu_new ml__5">New</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="product-detail-pickup-availability.html">Pickup Availability
                                                                    <span class="lbc_nav lb_menu_selling-feature ml__5">Selling Feature</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </li>
                                    <li class="type_mega menu_wid_cus menu-item has-children menu_has_offsets menu_center pos_center">
                                        <a class="lh__1 flex al_center pr" href="{{route('about')}}">Hakkımızda </a>

                                        {{--<div class="cus sub-menu">
                                            <div class="container megamenu-content-1000px">
                                                <div class="row lazy_menu lazyload" data-jspackery='{ "itemSelector": ".sub-column-item","gutter": 0,"percentPosition": true,"originLeft": true }'>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="home-default.html">HOMEPAGES</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="home-default.html">Home Default
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-classic.html">Home Classic
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-video-banner.html">Home Video Banner</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-categories-links.html">Home Categories Links</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-static-image.html">Home Static Image</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-metro.html">Home Metro</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-lookbook.html">Home Lookbook</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-parallax.html">Home Parallax</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-instagram-shop.html">Home Instagram Shop</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-medical.html">Home Medical
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-flower.html">Home Flower</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-furniture.html">Home Furniture
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-bag.html">Home Bag</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-lingeries.html">Home Lingeries</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-cosmetics.html">Home Cosmetics
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-glasses.html">Home Glasses
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-shoes.html">Home Shoes
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="home-default.html">HOMEPAGES</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="home-fashion9.html">Home Fashion 9</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-lookbook-collection.html">Home Lookbook Collection</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-simple.html">Home Fashion Simple</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion10.html">Home Fashion 10</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-decor.html">Home Decor</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-decor2.html">Home Decor 2</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-vertical.html">Home Fashion Vertical</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric.html">Home Electric</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric-vertical.html">Home Electric Vertical</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-digital.html">Home Digital</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-one-product-store.html">One Product Store
                                                                    <span class="lbc_nav lb_menu_hot ml__5">hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-handmade.html">Home Handmade</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-trend.html">Home Fashion Trend</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-kids.html">Home Kids</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-sport.html">Home Sport
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-jewelry.html">Home Jewelry
                                                                    <span class="lbc_nav lb_menu_new ml__5">new</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="home-default.html">Header Layouts</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="home-header-01.html">Header Layout 1</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-header-02.html">Header Layout 2</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-default.html">Header Layout 3</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-header-04.html">Header Layout 4</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric.html">Header Layout 5</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-header-06.html">Header Layout 6</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-fashion-vertical.html">Header Layout 7</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-electric-vertical.html">Header Layout 8</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-decor.html">Header Transparent</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="type_mn_link menu-item sub-column-item col-3">
                                                        <a href="shop-filter-sidebar.html">FEATURES</a>
                                                        <ul class="sub-column not_tt_mn">
                                                            <li class="menu-item">
                                                                <a href="shop-filter-options.html">Filter options
                                                                    <span class="lbc_nav lb_menu_hot ml__5">hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="index.html">Catalog mode</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop.html">Cookies law info</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-age-verified.html">Age verification</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-default.html">Mega menu</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-parallax.html">Footer sticky</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-right-sidebar.html">Right Sidebar</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-hidden-sidebar.html">Hidden sidebar</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="checkout.html">Checkout</a>
                                                            </li>

                                                            <li class="menu-item">
                                                                <a href="product-detail-frequently-bought-together.html">Frequently Bought Together</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="product-detail-variant-images-grouped.html">Variant Images Grouped</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-rtl.html">Demo RTL
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-grid-list-switcher.html">Grid/List switcher
                                                                    <span class="lbc_nav lb_menu_hot ml__5">Hot</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-shoes.html">Compare
                                                                    <span class="lbc_nav lb_menu_new ml__5">New</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="product-detail-pickup-availability.html">Pickup Availability
                                                                    <span class="lbc_nav lb_menu_selling-feature ml__5">Selling Feature</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </li>
                                    <li class="type_mega menu_wid_cus menu-item has-children menu_has_offsets menu_center pos_center">
                                        <a class="lh__1 flex al_center pr kalles-lbl__nav-sale" href="#">Ortaklarımız
                                            <span class="lbc_nav">Tebrikler </span>
                                        </a>
                                        <div class="cus sub-menu">
                                            <div class="container megamenu-content-1200px">
                                                <div class="row lazy_menu lazyload" data-jspackery='{ "itemSelector": ".sub-column-item","gutter": 0,"percentPosition": true,"originLeft": true }'>
                                                    <div class="type_mn_link2 menu-item sub-column-item col-2">
                                                        @foreach($shops as $shop)
                                                        <a href="{{route('shop.variants',$shop->id)}}">{{$shop->name}}</a>
                                                        @endforeach
                                                    </div>
                                                    <div class="type_mn_pr menu-item sub-column-item col-10">
                                                        <div class="prs_nav js_carousel nt_slider products nt_products_holder row al_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 is-draggable" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": 1,"prevNextButtons": 1,"percentPosition": 1,"pageDots": 0, "autoPlay" : 0, "pauseAutoPlayOnHover" : 1, "rightToLeft": false }'>
                                                            @foreach($shops as $shop)
                                                            <div class="col-lg-3 col-md-12 col-12 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                                                <div class="product-inner pr">
                                                                    <div class="product-image pr oh lazyload">
                                                                       {{-- <span class="tc nt_labels pa pe_none cw">
                                                                            <span class="nt_label new">New</span>
                                                                        </span>--}}
                                                                        <a class="d-block" href="{{route('shop.variants',$shop->id)}}">
                                                                            <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="{{$shop->getFirstMediaUrl('shop_logos')}}"></div>
                                                                        </a>

                                                                       {{-- <div class="nt_add_w ts__03 pa ">
                                                                            <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                                                                <span class="tt_txt">Add to Wishlist</span>
                                                                                <i class="facl facl-heart-o"></i>
                                                                            </a>
                                                                        </div>--}}
                                                                        {{--<div class="hover_button op__0 tc pa flex column ts__03">
                                                                            <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                                                                <span class="tt_txt">Quick view</span>
                                                                                <i class="iccl iccl-eye"></i>
                                                                                <span>Quick view</span>
                                                                            </a>
                                                                            <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left">
                                                                                <span class="tt_txt">Quick Shop</span>
                                                                                <i class="iccl iccl-cart"></i>
                                                                                <span>Quick Shop</span>
                                                                            </a>
                                                                        </div>--}}
                                                                       {{-- <div class="product-attr pa ts__03 cw op__0 tc">
                                                                            <p class="truncate mg__0 w__100">XS, S, M, L, XL</p>
                                                                        </div>--}}
                                                                    </div>
                                                                    <div class="product-info mt__15">
                                                                        <h3 class="product-title pr fs__14 mg__0 fwm">
                                                                            <a class="cd chp" href="{{route('shop.variants',$shop->id)}}">{{$shop->name}}</a>
                                                                        </h3>
                                                                        <span class="price dib mb__5">Yeni Üye</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                        <a class="lh__1 flex al_center pr" href="#" data-toggle="modal" data-target="#site_rating"  >Bizi Yorumlayın :)</a>

                                    </li>
                                    <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                        <a class="lh__1 flex al_center pr" href="{{route('contact')}}">İletişim</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-auto col-md-4 col-3 tr col_group_btns">
                            <div class="nt_action in_flex al_center cart_des_1">
                             {{--   <a class="icon_search push_side cb chp" data-id="#nt_search_canvas" href="#">
                                    <i class="iccl iccl-search"></i></a>--}}
                                <div class="my-account ts__05 position-relative dn db_md">
                                    <a class="cb chp db push_side" href="#" data-id="#nt_login_canvas">
                                        <i class="iccl iccl-user"></i></a>
                                </div>
                             {{--   <a class="icon_like cb chp position-relative dn db_md js_link_wis" href="wishlist.html"><i class="iccl iccl-heart pr"><span class="op__0 ts_op pa tcount bgb br__50 cw tc">3</span></i>
                                </a>--}}
                                <div class="icon_cart pr">
                                    <a class="push_side position-relative cb chp db" href="#" data-id="#nt_cart_canvas"><i class="iccl iccl-cart pr"><span class="op__0 ts_op pa tcount bgb br__50 cw tc">!</span></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
