<!-- mobile menu -->
<div id="nt_menu_canvas" class="nt_fk_canvas nt_sleft dn lazyload">
    <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
    <div class="mb_nav_tabs flex al_center mb_cat_true">
        <div class="mb_nav_title pr mb_nav_ul flex al_center fl_center active" data-id="#kalles-section-mb_nav_js">
            <span class="db truncate">Menü</span>
        </div>
        <div class="mb_nav_title pr flex al_center fl_center" data-id="#kalles-section-mb_cat_js">
            <span class="db truncate">KategorilerSSS </span>
        </div>
    </div>
    <div id="kalles-section-mb_nav_js" class="mb_nav_tab active">
        <div id="kalles-section-mb_nav" class="kalles-section">
            <ul id="menu_mb_ul" class="nt_mb_menu">
                <li class="menu-item"><a href="shop.html">Anasayfa </a></li>
                <li class="menu-item"><a href="shop.html">Üye Ol </a></li>
                <li class="menu-item"><a href="shop.html">Hakkımızda </a></li>
                <li class="menu-item"><a href="shop.html">Ortaklarımız  </a></li>

                <li class="menu-item"><a href="shop.html">Sosyal Medya Hesaplarımız   </a></li>



            </ul>
        </div>
    </div>
    <div id="kalles-section-mb_cat_js" class="mb_nav_tab">
        <div id="kalles-section-mb_cat" class="kalles-section">
            <ul id="menu_mb_cat" class="nt_mb_menu">
                @foreach($root_categories as $category)
                <li class="menu-item">
                    <a href="{{route('shopping',$category->id)}}"><i class="las la-female mr__10 fs__20"></i>{{$category->name}}</a>
                </li>
                @endforeach


            </ul>
        </div>
    </div>
</div>
<!-- end mobile menu -->
