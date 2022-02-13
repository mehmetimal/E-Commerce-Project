<!-- mobile toolbar -->
<div id="kalles-section-toolbar_mobile" class="kalles-section">
    <div class="kalles_toolbar kalles_toolbar_label_true ntpf r__0 l__0 b__0 flex fl_between al_center">
        <div class="type_toolbar_shop kalles_toolbar_item">
            <a href="{{route('index')}}">
                <span class="toolbar_icon"></span>
                <span class="kalles_toolbar_label">Anasayfa</span>
            </a>
        </div>

        <div class="type_toolbar_wish kalles_toolbar_item">
            <a class="js_link_wis fa fa-whatsapp fa-2x" href="https://wa.me/{{$site_setting->phone}}?text=Merhaba%20Bir%20Konuda%20Bilgi%20Almak%20İstiyorum">

                <span class="kalles_toolbar_label">WhahtsApp</span>
            </a>
        </div>
        <div class="type_toolbar_cart kalles_toolbar_item">
            <a href="#" class="push_side" data-id="#nt_cart_canvas">
				<span class="toolbar_icon">
					<span class="jsccount toolbar_count">!</span>
				</span>
                <span class="kalles_toolbar_label">Sepetim</span>
            </a>
        </div>
        <div class="type_toolbar_account kalles_toolbar_item">
            <a href="#" class="push_side" data-id="#nt_login_canvas">
                <span class="toolbar_icon"></span>
                <span class="kalles_toolbar_label">Profilim</span>
            </a>
        </div>

    </div>
</div>
<!-- end mobile toolbar -->
