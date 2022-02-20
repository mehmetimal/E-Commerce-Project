
<!--product container-->
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="kalles-section tp_se_cdt">

            <!--filter result-->
            <div class="result_clear mt__30 mb__20 dn">
                <div class="sp_result_html dib cb clear_filter"><span class="cp">20</span> Products Found
                </div>
                <a class="clear_filter dib" href="#">Clear All Filter</a><a href="#" class="clear_filter dib bf_icons" aria-label="Remove tag Size  M">Size M</a><a href="#" class="clear_filter dib bf_icons" aria-label="Remove tag Color  Cyan">Color Cyan</a><a href="#" class="clear_filter dib bf_icons" aria-label="Remove tag Vendor  Kalles">Vendor Kalles</a>
            </div>
            <!--end filter result-->

            <!--products list-->
            <div class="on_list_view_false products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30 nt_default">
                @forelse($variants as $variant)



                    <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                        <div class="product-inner pr">
                            <div class="product-image pr oh lazyload">
                                {{--
                                --}}
                                <a class="d-block" href="#">
                                    <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="{{isset($variant->getMedia('variants')[0]) ? $variant->getMedia('variants')[0]->getUrl('big') : asset('/images/no_image.png') }}"></div>
                                </a>
                                <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                    <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="{{isset($variant->getMedia('variants')[1]) ? $variant->getMedia('variants')[1]->getUrl('big') : ''}}"></div>
                                </div>
                                <div class="nt_add_w ts__03 pa ">
                                    <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Gelince Haber Ver </span><i class="facl facl-heart-o"></i></a>
                                </div>
                                <div class="hover_button op__0 tc pa flex column ts__03">
                                    <a data-variant-id="{{$variant->id}}" class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#"><span class="tt_txt">Hızlı Gorunum </span><i class="iccl iccl-eye"></i><span>Hızlı Görünüm </span></a>
                                    <a data-variant-id="{{$variant->id}}"
                                       data-product_name="{{$variant->product->name}}"
                                       data-variant_name="{{$variant->name}}"
                                       data-variant_price="{{$variant->price}}"
                                       data-variant_barcode="{{$variant->barcode}}"
                                       data-quantity="1"
                                       data-shop-id="{{$variant->product->shop->id}}"
                                       data-max_aviable_quantity="{{$variant->quantity}}"
                                       data-image_url="{{isset($variant->getMedia('variants')[0]) ? $variant->getMedia('variants')[0]->getUrl('big') : asset('/images/no_image.png')}}"
                                       href="#" class="pr pr_atc cd br__40 bgw tc dib singleClickAddToCart cb chp ttip_nt tooltip_top_left"><span class="tt_txt">Sepete Ekle</span><i class="iccl iccl-cart"></i><span>Sepete Ekle </span></a>
                                </div>
                                <div class="product-attr pa ts__03 cw op__0 tc">
                                    <p class="truncate mg__0 w__100">Stokta</p>
                                </div>
                            </div>
                            <div class="product-info mt__15">
                                <h3 class="product-title pr fs__14 mg__0 fwm">
                                    <a   data-variant-id="{{$variant->id}}" class="cd chp js_add_qv " href="#">{{$variant->name}} - {{$variant->product->name}}</a>
                                </h3>
                                <span class="price dib mb__5">₺{{$variant->price}}</span>
                                <a  href="{{route('shop.variants', $variant->product->shop->id)}}" class="float-right dib mb__5" style="color: orange"><b>@_{{ $variant->product->shop->nick_name }}</b></a>
                            </div>
                        </div>
                    </div>

                @empty
                <h1>Aradığınız Ürün Bulunamadı </h1>
                @endforelse
            </div>
            <!--end products list-->

            <!--navigation-->
            <div class="products-footer tc mt__40">
                <nav class="nt-pagination w__100 tc paginate_ajax">
                    <ul class="pagination-page page-numbers">

                        <li><span class="page-numbers current">{{$variants->links()}}</span></li>

                    </ul>
                </nav>
            </div>
            <!--end navigation-->

        </div>
    </div>
</div>
<!--end product container-->
