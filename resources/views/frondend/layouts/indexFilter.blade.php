<!--filter index panel area-->

<div class="filter_area_js filter_area lazyload">
    <div id="kalles-section-nt_filter" class="kalles-section nt_ajaxFilter section_nt_filter">
        <div class="h3 mg__0 tu bgb cw visible-sm fs__16 pr">Filtrele<i class="close_pp pegk pe-7s-close fs__40 ml__5"></i>
        </div>
        <div class="cat_shop_wrap">
            <div class="cat_fixcl-scroll">
                <div class="cat_fixcl-scroll-content css_ntbar">
                    <div class="row wrap_filter" id="filter_div">
                        {{--ÖZELLİK DEGERİNE GÖRE FİLTRELE --}}
                        <form id="filterForm" method="POST"  action="{{route('filter.index.variants')}}">
                            @csrf
                            <div class="col-12 col-md-3 widget">
                                <h5 class="widget-title">Kategoriye Göre Filtrele  </h5>
                                <div class="loke_scroll" id="category_filter_div">
                                    <ul class="nt_filter_block nt_filter_styleck css_ntbar" >
                                       @if(isset($descants)   )

                                            @foreach($descants as $category)
                                                <li data-category-id="{{$category->id}}">
                                                    <a href="#" aria-label="Narrow selection to products matching tag size s">{{$category->name}}</a>
                                                </li>
                                            @endforeach
                                        @else
                                            @foreach($categories as $category)
                                                <li data-category-id="{{$category->id}}">
                                                    <a href="#" aria-label="Narrow selection to products matching tag size s">{{$category->name}}</a>
                                                </li>
                                            @endforeach
                                        @endisset
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 widget">
                                <h5 class="widget-title">Dükkana  Göre Filtrele  </h5>
                                <div class="loke_scroll" id="shop_filter_div">
                                    <ul class="nt_filter_block nt_filter_styleck css_ntbar" data-filter_condition="and">
                                        @foreach($shops  as $shop)
                                            <li data-shop-id="{{$shop->id}}">
                                                <a href="#" aria-label=" tag">{{$shop->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                            {{--FİYATA GÖRE FİLTRELE --}}
                            <div class="col-12 col-md-3 widget" >
                                <h5 class="widget-title">Fiyata Göre Filtrele </h5>
                                <div class="loke_scroll" id="price_filter_div">
                                    <ul class="nt_filter_block nt_filter_styleck css_ntbar" data-filter_condition="or">

                                        <li  data-price-range="10-50">
                                            <a href="#" aria-label=" tag ">₺10-₺50</a>
                                        </li>
                                        <li data-price-range="50-100">
                                            <a href="#" aria-label="tag">₺50-₺100</a>
                                        </li>
                                        <li data-price-range="150-200" >
                                            <a href="#" aria-label="tag">₺150-₺200</a>
                                        </li>
                                        <li data-price-range="250-300">
                                            <a href="#"  aria-label=" tag ">₺250-₺300</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 tc mt__20 mb__20 dn">
                                <a class="button" id="filter_button" href="#">Filtrele </a>
                                <a class="button clear_filter_js" href="#">Filtreleri Temizle</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')

    <script>
        $('#filter_button').on('click',function (){

            $("#category_filter_div > ul >li.active").each(function(index,item) {
                $('#filterForm').append('<input  name="category_id" value="'+$(this).data('category-id')+'">')

            })
            $("#shop_filter_div > ul >li.active").each(function(index,item) {
                $('#filterForm').append('<input  name="shop_ids[]" value="'+$(this).data('shop-id')+'">')
            })
            $('#price_filter_div >ul >li.active').each(function (){
                $('#filterForm').append('<input  name="price_range" value="'+$(this).data('price-range')+'">')

            })
            $('#filterForm').submit();
        })

    </script>

@endpush
<!--end filter index panel area-->
