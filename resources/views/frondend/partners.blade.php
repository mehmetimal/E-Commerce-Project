@extends('frondend.layouts.app')
@section('banner_title', 'Ortaklarımız')
@section('banner_text','Biz Bir Aileyiz ! Bizimle Birlikte Olan satıcılarımızı görebilir ürünlerini inceleyebilirsin   ')
@section('content')

    <div class="container container_cat nt_pop_sidebar cat_default mb__20">




        <!--product container-->
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="kalles-section tp_se_cdt">



                    <!--products list-->
                    <div class="on_list_view_false products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30 nt_default">
                        @foreach($partners as $partner)



                            <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                                <div class="product-inner pr">
                                    <div class="product-image pr oh lazyload">
                                        {{--
                                        --}}
                                        <a class="d-block" href="#">
                                            <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="{{$partner->getFirstMediaUrl('shop_logos','big')}}"></div>
                                        </a>

                                        <div class="hover_button op__0 tc pa flex column ts__03">
                                            <a class="pr nt_add_qv  cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="{{route('shop.variants', $partner->id)}}"><span class="tt_txt">Ortağın Ürünlerini İncele </span><i class="iccl iccl-eye"></i><span>Ortağın Ürünlerini İncele </span></a>
                                        </div>
                                        <div class="product-attr pa ts__03 cw op__0 tc">
                                            <p class="truncate mg__0 w__100">{{$partner->name}}</p>
                                        </div>
                                    </div>
                                    <div class="product-info mt__15">
                                        <h3 class="product-title pr fs__14 mg__0 fwm">
                                            <a   class="cd chp " href="{{route('shop.variants', $partner->id)}}">{{$partner->name}} </a>
                                        </h3>

                                    </div>
                                </div>
                            </div>



                        @endforeach
                    </div>
                    <!--end products list-->

                    <!--navigation-->
                    <div class="products-footer tc mt__40">
                        <nav class="nt-pagination w__100 tc paginate_ajax">
                            <ul class="pagination-page page-numbers">

                                <li><span class="page-numbers current">{{$partners->links()}}</span></li>

                            </ul>
                        </nav>
                    </div>
                    <!--end navigation-->

                </div>
            </div>
        </div>
        <!--end product container-->

    </div>


@endsection
