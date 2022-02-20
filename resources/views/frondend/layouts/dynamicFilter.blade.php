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
                        @csrf
                        @foreach($attributes as $attribute)
                            <div class="col-12 col-md-3 widget">
                                <h5 data-attribute-id="{{$attribute->id}}" class="widget-title attribute_name">{{$attribute->name}}  </h5>
                                <div class="loke_scroll attribute_value_div" id="attribute_filter_div">
                                    <ul class="nt_filter_block nt_filter_styleck css_ntbar" data-filter_condition="and">
                                        @foreach($attribute->values as $value)
                                            <li data-value-id="{{$value->id}}">
                                                <a href="#" aria-label="Narrow selection to products matching tag size s">{{$value->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 tc mt__20 mb__20 dn">
                            <a class="button" id="filter_button" href="#">Filtrele </a>
                            <a class="button clear_filter_js" href="#">Filtreleri Temizle</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@push('js')

    <script>

        $('#filter_button').on('click',function (){
        let variantNameAndAttributes=[];

        let value_idsTmp=[];
        var   $div =   $(this).closest('#filter_div').find('.attribute_name');

         $.each($div,function (){

        $.each($(this).closest('div').find('.attribute_value_div').find('ul > li.active'),function (index,item){
            value_idsTmp.push($(this).data('value-id'));
        })
         if($(this).closest('div').find('.attribute_value_div').find('ul > li.active').length){
         var attributeName =$(this).attr('data-attribute-id');

        variantNameAndAttributes.push({
            "attribute_id":attributeName,
            "value_id":value_idsTmp
        });

         }
             value_idsTmp=[];
         })
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{route('filter.by.attribute')}}",
                type: "POST",
                data: {
                    _token: _token,
                    attribute_name_and_values:variantNameAndAttributes

                },
                success: function (variantList) {
if(variantList.length){
    console.log('var ')
}else{
    console.log('yok')
}
                   document.getElementById('variantList').innerHTML=variantList;

                },
            });





           // $('#filterForm').submit();
        })

    </script>

@endpush
<!--end filter index panel area-->
