<!-- mini cart box -->
<div id="nt_cart_canvas" class="nt_fk_canvas dn">
    <div class="nt_mini_cart nt_js_cart flex column h__100 btns_cart_1">
        <div class="mini_cart_header flex fl_between al_center">
            <div class="h3 fwm tu fs__16 mg__0">Sepetim</div>
            <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
        </div>
        <div class="cart_threshold cart_thres_js">
            <div class="cart_thres_2">Kampanya !
                <span class="cr fwm mn_thres_js">300 TL ve Üzeri </span> Alışverişlerde  <span class="cr fwm">Kargo Bedava </span>
            </div>
        </div>
        <div class="mini_cart_wrap">
            <div class="mini_cart_content fixcl-scroll">
                <div class="fixcl-scroll-content">
                    <div class="empty tc mt__40 dn"><i class="las la-shopping-bag pr mb__10"></i>
                        <p>Sepetiniz Boş.</p>
                        <p class="return-to-shop mb__15">
                            <a class="button button_primary tu js_add_ld" href="shop-filter-sidebar.html">Return To Shop</a>
                        </p>
                    </div>
                    <div class="mini_cart_items js_cat_items lazyload"  id="cart_items">
                         @include('frondend.layouts.CartItems')
                    </div>
                    <div class="mini_cart_tool js_cart_tool tc ">
                      @include('frondend.layouts.cartTools')
                    </div>
                </div>
            </div>
            <div class="mini_cart_footer js_cart_footer">
                <div class="js_cat_dics"></div>
                <div class="total row fl_between al_center">
                    <div class="col-auto"><strong>Toplam:</strong></div>
                    <div class="col-auto tr js_cat_ttprice">
                        <div class="cart_tot_price"  id="cartSubtotal"> ₺{{Cart::subTotal()}}</div>
                    </div>
                </div>
                <p class="txt_tax_ship mb__5 fs__12">Fiyatlarımıza KDV Dahildir </p>
               {{-- <p class="pr db mb__5 fs__12">
                    <input type="checkbox" id="cart_agree" class="js_agree_ck mr__5" name="ck_lumise"><label for="cart_agree">I agree with the terms and conditions.</label>
                    <svg class="dn scl_selected" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M9 20l-7-7 3-3 4 4L19 4l3 3z"></path>
                    </svg>
                </p>--}}
                <a href="{{route('index')}}" class="button btn-cart mt__10 mb__10 js_add_ld d-inline-flex justify-content-center align-items-center cd-imp">Alışverişe Devam Et</a>
                <a href="{{route('checkout')}}" class="button btn-checkout mt__10 mb__10 js_add_ld d-inline-flex justify-content-center align-items-center text-white">Ödemye Geç</a>
                <div class="cat_img_trust mt__10 lazyload">
                    <img class="w__100" src="{{asset('/images/trust_img2.png')}}" width="360" height="46" alt="">
                </div>
            </div>
        </div>

        <!--mini cart tool cart node-->
        <div class="mini_cart_note pe_none">
            <label for="CartSpecialInstructions" class="mb__5 dib"><span class="txt_add_note ">Sipariş Notu Ekle </span><span class="txt_edit_note dn">Edit Order Note</span></label>
            <textarea name="note" id="CartSpecialInstructions" placeholder="Siparişinizin Tam İstediğiniz gibi gelmesini önemsiyoruz  Eğer bize iletmek istediğiniz bir notunuz varsa ekleyebilirsiniz ?"></textarea>
            <input type="button" class="button btn_back js_cart_tls_back mt__15 mb__10" value="Kaydet">
            <input type="button" class="button btn_back btn_back2 js_cart_tls_back" value="İptal">
        </div>

        <!--mini cart tool cart gift-->
        <div class="mini_cart_gift pe_none">
            <div class="shipping_calculator tc">
                <p class="field">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="cd dib pr">
                        <polyline points="20 12 20 22 4 22 4 12"></polyline>
                        <rect x="2" y="7" width="20" height="5"></rect>
                        <line x1="12" y1="22" x2="12" y2="7"></line>
                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                    </svg>
                    <span class="gift_wrap_text mt__10 db"><span class="cd">Her Siparişinize Fiyat Farketmeksizin </span> Anahtarlık Hediye !</span>
                </p>
            {{--    <p class="field">
                    <a href="shop-filter-sidebar.html" class="w__100 tu tc button button_primary truncate js_addtc">Add A Gift Wrap</a>
                </p>--}}
                <p class="field">
                    <input type="button" class="button btn_back js_cart_tls_back" value="Anladım">
                </p>
            </div>
        </div>

        <!--mini cart tool shipping-->
        <div class="mini_cart_ship pe_none">
            <div class="shipping_calculator">
                <h3>Çalıştığımız Kargolar </h3>
                <p class="field">
                    <label for="address_country_ship">PTT KARGO</label>
                 {{--   <select id="address_country_ship" class=" lazyload">
                        <option value="" selected>---</option>
                        <option value="United States">United States</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Italy">Italy</option>
                        <option value="Germany">Germany</option>
                        <option value="France">France</option>
                        <option value="Spain">Spain</option>
                        <option value="Australia">Australia</option>
                        <option value="Finland">Finland</option>
                        <option value="Austria">Austria</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Canada">Canada</option>
                        <option value="Chile">Chile</option>
                        <option value="Cuba">Cuba</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Japan">Japan</option>
                    </select>--}}
                </p>
               {{-- <p class="field">
                    <label for="address_zip_ship">Postal/Zip Code</label>
                    <input type="text" id="address_zip_ship">
                </p>
                <p class="field">
                    <input type="button" class="get_rates button" value="Calculate Shipping">
                </p>--}}
                <p class="field">
                    <input type="button" class="button btn_back js_cart_tls_back" value="Kapat">
                </p>
                <div id="response_calcship"></div>
            </div>
        </div>

        <!--mini cart tool coupon-->
        <div class="mini_cart_dis pe_none">
            <div class="shipping_calculator">
                <h3>Kupon Ekle  <small title="Sosyal medya hesaplarımızı takip et ve kampanya ,Kupon Kodlarından haberdar ol ">(Nasıl Kupon Kodu Elde Ederim ?)</small></h3>
                <p>En ucuz ve en kaliteli ürünlerin bizde olduğunu biliyoruz :) ama kuon kodun varsa siparişini daha da uygun hale getirebilirsin !</p>
                <p class="field">
                    <input type="text" name="discount" value="" placeholder="Kupon Kodu">
                </p>
                <p class="field">
                    <input type="button" class="button btn_back js_cart_tls_back" value="Kodu Gir ">
                </p>
                <input type="button" class="button btn_back btn_back2 js_cart_tls_back" value="Vazgec">
            </div>
        </div>

    </div>
</div>
<!-- end mini cart box-->
