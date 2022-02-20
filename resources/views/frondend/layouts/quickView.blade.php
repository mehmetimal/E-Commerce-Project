<!--quick view-->
<div id="quick-view-tpl" class="dn">
    <div class="product-quickview single-product-content img_action_zoom kalles-quick-view-tpl">
        <div class="row product-image-summary">
            <div class="col-lg-7 col-md-6 col-12 product-images pr oh">
                <div class="images">
                    <div id="variant_images_div" class="product-images-slider tc equal_nt nt_slider nt_carousel_qv p-thumb_qv nt_contain ratio_imgtrue position_8" data-flickity='{ "fade":true,"cellSelector": ".q-item:not(.is_varhide)","cellAlign": "center","wrapAround": true,"autoPlay": false,"prevNextButtons":true,"adaptiveHeight": true,"imagesLoaded": false, "lazyLoad": 0,"dragThreshold" : 0,"pageDots": true,"rightToLeft": false }'>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-12 summary entry-summary pr">
                <div class="summary-inner gecko-scroll-quick">
                    <div class="gecko-scroll-content-quick">
                        <div class="kalles-section-pr_summary kalles-section summary entry-summary mt__30">
                            <h1 class="product_title entry-title fs__16"><a href="" id="variant_name"></a></h1>
                            <div class="flex wrap fl_between al_center price-review">
                                <p class="price_range" id="price_qv">

                                    <ins id="variant_price"></ins>
                                </p>
                                <a href="" id="product_link" class="rating_sp_kl dib">
                                    <div class="kalles-rating-result">
                                        <span style="font-size: 12px" class="kalles-rating-result__number" id="product_name"></span>
                                    </div>
                                </a>
                            </div>
                            <div class="pr_short_des">
                                <p class="mg__0" id="product_long_description"></p>
                            </div>
                            <div class="btn-atc atc-slide btn_des_1 btn_txt_3">
                                <div id="callBackVariant_qv" class="nt_pink nt1_ nt2_">
                                    <div id="cart-form_qv" class="nt_cart_form variations_form variations_form_qv">

                                        <div class="variations_button in_flex column w__100 buy_qv_false">
                                            <div class="flex wrap">
                                                <div class="quantity pr mr__10 order-1 qty__true" id="sp_qty_qv">
                                                    <input  type="number" class="input-text qty text tc qty_pr_js qty_cart_js" min="1" value="1" name="quantity" id="quick_view_quantity_input" inputmode="numeric">
                                                    <div class="qty tc fs__14">
                                                        <button id="quantity" data-max-quantity="" type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                                            <i class="facl facl-plus"></i>
                                                        </button>
                                                        <button type="button" class="minus db cb pa pd__0 pl__15 tl l__0">
                                                            <i class="facl facl-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="nt_add_w ts__03 pa order-3">
                                                    <a href="#" class="wishlistadd cb chp ttip_nt tooltip_top_left"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                                </div>
                                                <button  type="submit" data-time='6000' data-ani='shake' class="single_add_to_cart_button button truncate js_frm_cart w__100 mt__20 order-4">
                                                    <span class="txt_add ">Sepete Ekle </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="trust_seal_qv" class="pr_trust_seal tl">
                                <p class="mess_cd cb mb__10 fwm tu fs_16"></p>
                                <img class="lazyload img_tr_s1 w__100" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%202244%20285%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-src="{{asset('images/trust_img2.png')}}" alt="">
                            </div>
                            <div class="product_meta">
                                <span class="sku_wrapper"><span class="cb">ÜRÜN KODU  :</span> <span class="sku value cg" id="variant_barcode"></span></span>
                                <span class="sku_wrapper"><span class="cb">ÜRÜN ADEDİ  :</span> <span class="sku value cg" id="variant_quantity_text"></span></span>
                                <span class="sku_wrapper"><span class="cb">KISA AÇIKLAMA   :</span> <span class="sku value cg" id="product_short_description"></span></span>
                                <input id="shop_id" type="hidden" value="">
                                <span class="posted_in"><span class="cb">Tüm Ana Kategoriler :</span>
                                 @foreach($root_categories as $rootCategory)
                                        <a href="{{route('shopping',$rootCategory->id)}}" class="cg" title="Accessories">{{$rootCategory->name}}</a>
                                        @if(!$loop->last)
                                            ,
                                @endif

                                @endforeach
                            </div>
                            <div class="social-share tc">
                                <div class="at-share-btn-elements kalles-social-media d-block text-left fs__0 lh__1">
                                    <a href="{{$site_setting->facebook}}" class="at-icon-wrapper at-share-btn at-svc-facebook bg-white kalles-social-media__btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-facebook">
                                            <g>
                                                <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                    </a>

                                    <a href="{{route('contact')}}"  class="at-icon-wrapper at-share-btn at-svc-email bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-email kalles-social-media__btn">
                                            <g>
                                                <g fill-rule="evenodd"></g>
                                                <path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path>
                                                <path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path>
                                            </g>
                                        </svg>
                                    </a>

                                    <a href="{{$site_setting->instagram}}"  class="at-icon-wrapper at-share-btn at-icon-email bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"   viewBox="-2 -2 23 23" class="at-icon at-icon-instagram kalles-social-media__btn">
                                            <g>
                                                <g fill-rule="evenodd"></g>
                                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                            </g>
                                        </svg>
                                    </a>
                                    {{--Whatsupp gelecek --}}
                                    <a href="https://wa.me/{{$site_setting->phone}}?text=Merhaba%20Bir%20Konuda%20Bilgi%20Almak%20İstiyorum"  class="at-icon-wrapper at-share-btn at-icon-email bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"   viewBox="-2 -2 23 23" class="at-icon at-icon-instagram kalles-social-media__btn">
                                            <g>
                                                <g fill-rule="evenodd"></g>
                                                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="{{$site_setting->pinterest}}" class="at-icon-wrapper at-share-btn at-svc-pinterest_share bg-white kalles-social-media__btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="at-icon at-icon-pinterest_share">
                                            <g>
                                                <path d="M7 13.252c0 1.81.772 4.45 2.895 5.045.074.014.178.04.252.04.49 0 .772-1.27.772-1.63 0-.428-1.174-1.34-1.174-3.123 0-3.705 3.028-6.33 6.947-6.33 3.37 0 5.863 1.782 5.863 5.058 0 2.446-1.054 7.035-4.468 7.035-1.232 0-2.286-.83-2.286-2.018 0-1.742 1.307-3.43 1.307-5.225 0-1.092-.67-1.977-1.916-1.977-1.692 0-2.732 1.77-2.732 3.165 0 .774.104 1.63.476 2.336-.683 2.736-2.08 6.814-2.08 9.633 0 .87.135 1.728.224 2.6l.134.137.207-.07c2.494-3.178 2.405-3.8 3.533-7.96.61 1.077 2.182 1.658 3.43 1.658 5.254 0 7.614-4.77 7.614-9.067C26 7.987 21.755 5 17.094 5 12.017 5 7 8.15 7 13.252z" fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                    </a>

                                </div>
                            </div>
                            <a href=""  id="variant_detail" class="btn fwsb detail_link p-0 fs__14">Ürüne Ait Diğer Çeşitler  <i class="facl facl-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end quick view-->

<!--script  quick view-->
@push('js')
    <script>
        $( document ).ready(function() {
            $('.js_add_qv').on('click', function () {

                let _token = $('meta[name="csrf-token"]').attr('content');
                let variant_id = $(this).data('variant-id');
                //Manuel Eklendi
                setTimeout(function(){
                    $.ajax({
                        url: "{{route('get.variant.detail')}}",
                        type: "POST",
                        data: {
                            _token: _token,
                            variant_id: variant_id,
                        },
                        success: function (variant_detail) {
                            $('#variant_images_div').html('')
                            // $variant_detail_modal = $('#quick-shop-tpl')

                            if(variant_detail.medias.length <= 0){
                                $image_empty_url ='{{asset('/images/no_image.png')}}'
                                $('#variant_images_div').append('<div  data-grname="not4" data-grpvl="ntt4" class="js-sl-item q-item sp-pr-gallery__img w__100" data-mdtype="image"> ' +
                                    ' <span class="nt_bg_lz lazyload" data-bgset="'+$image_empty_url+' "></span>' +
                                    ' </div>');
                            }else{
                                $.each(variant_detail.medias, function (index, item) {
                                    $('#variant_images_div').append('<div  data-grname="not4" data-grpvl="ntt4" class="js-sl-item q-item sp-pr-gallery__img w__100" data-mdtype="image"> ' +
                                        ' <span class="nt_bg_lz lazyload" data-bgset="' + variant_detail.medias[index] + '"></span>' +
                                        ' </div>')
                                });
                            }

                            $('#product_link').attr("href", "/urun-cesitleri/" + variant_detail.variant.product.id)
                            $("#variant_detail").attr("href", "/urun-cesitleri/" + variant_detail.variant.product.id)
                            $("#variant_name").text(variant_detail.variant.name)
                            $("#product_name").text(variant_detail.variant.product.name)
                            $('#variant_price').text('₺' + variant_detail.variant.price)
                            $('#product_long_description').html(variant_detail.variant.product.detail.long_description)
                            $('#variant_barcode').text(variant_detail.variant.barcode)
                            $('#product_short_description').text(variant_detail.variant.product.detail.short_description)
                            $('#variant_quantity_text').text(variant_detail.variant.quantity)
                            $('#shop_id').val(variant_detail.variant.product.shop.id)
                            $("#quantity").attr({
                                "data-max-quantity" : variant_detail.variant.quantity,
                            });



                        }
                    }, 100);
                })




            })


        });


    </script>

@endpush
