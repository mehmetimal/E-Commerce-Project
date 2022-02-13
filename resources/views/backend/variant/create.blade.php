@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">

    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{asset('backend/css/bs-stepper.min.css')}}">

    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-duallistbox.min.css')}}">
@endpush
@section('currentPage','Ürün Ekle')
@section('current_tab','Ürün Ekle')
@section('content')
    <style>
        .select2-selection__rendered {
            line-height: 45px !important;
        }
        .select2-container .select2-selection--single {
            height: 45px !important;
        }
        .select2-selection__arrow {
            height: 44px !important;
        }
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Varyant  Eklemek İçin Adımları Takip edin Ve Gerekli Alanları eksiksiz doldurunuz </h3>
                </div>
                <div class="card-body p-0">
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">

                            <!-- your steps here -->
                            <div class="step" data-target="#product_step_1">
                                <button type="button"  class="step-trigger" role="tab" aria-controls="logins-part" >
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Ürün Seç </span>
                                </button>
                            </div>
                            <div class="step" data-target="#product_step_2">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Varyantlar  </span>
                                </button>
                            </div>

                            <div class="line"></div>
                            <div class="step" data-target="#product_step_3">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                    <span class="bs-stepper-circle">5</span>
                                    <span class="bs-stepper-label">Kaydet & Bitir</span>
                                </button>
                            </div>


                        </div>
                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="product_step_1" class="content" role="tabpanel" >

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Ürünler</label>
                                                <select id="product_id" name ="product_id" required class="product" >
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <button id="product_step_trigger_1" class="btn btn-primary" onclick="stepper.next()">Sonraki Adım</button>
                            </div>

                            <div id="product_step_2" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                                <div class="dynamic-wrap">
                                    <div>
                                        {{--   <input id="attributeFormValue" name="name" type="hidden" required >--}}

                                        <div class="entry input-group">

                                            <div class="row">

                                                <div class="col form-group">
                                                    <input    class="form-control quantities" name="quantities[]" type="number" min="1" placeholder="Adet " required/>
                                                </div>
                                                <div class="col form-group">


                                                    <input    class="form-control prices" name="prices[]" type="number"  min="1"  placeholder="Fiyat " required/>

                                                </div>

                                                <div class="col form-group" id="attributesDiv">

                                                </div>
                                                <span class ="input-group-btn">
                                            <button class="btn btn-success btn-add" type="button">
                                                <span class="icon fa fa-plus-circle"></span>
                                            </button>
                                        </span>
                                            </div>

                                        </div>
                                        <br>
                                    </div>
                                    <button id="product_previous_trigger_2" class="btn btn-primary" onclick="stepper.previous()">Önceki</button>
                                    <button  id="product_step_trigger_2" class="btn btn-primary" onclick="stepper.next()">Sonraki</button>

                                </div>

                            </div>

                            <div id="product_step_3" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                <div class="row">
                                    <div class="col">
                                        <h1>Ürün Bilgleri</h1>
                                        <label class="form-control" id="product_name_label"></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-hover">

                                            <thead>
                                            <tr>
                                                <th colspan="4" class="text-danger text-center" scope="col">Ürün Varyantları </th>
                                            </tr>
                                            <tr>

                                                <th scope="col">İSİM  </th>
                                                <th scope="col">ADET </th>
                                                <th scope="col">BİRİM ÜCRET </th>
                                            </tr>
                                            </thead>
                                            <tbody id="productAttributes">


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <button id="product_previous_trigger_3" class="btn btn-primary" onclick="stepper.previous()">Önceki</button>
                                <button id="product_step_trigger_3" type="button" class="btn btn-primary">Kaydet & Resim Ekle </button>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <p><b id="stepper_info_text"> Varyant Eklemek İstediğiniz Ürünü Seçiniz  </b></p>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    @push('js')


        <!-- Bootstrap Switch -->
        <script src="{{asset('backend/js/bootstrap-switch.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('backend/js/select2.full.min.js')}}"></script>
        <!-- BS-Stepper -->
        <script src="{{asset('backend/js/bs-stepper.min.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
        <script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>

        <!-- Bootstrap4 Duallistbox -->

        <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

        {{--initilaize elements--}}

        <script>

            $('.product').select2({
                placeholder:'Ürün Seç'
            });
            // BS-Stepper Init
            document.addEventListener('DOMContentLoaded', function () {
                window.stepper = new Stepper(document.querySelector('.bs-stepper'))
            })

        </script>


        <script>
            let productId;
            let isPrevious =false ;

            let attribute_ids;
            let variantAttributesTmp =[];
            let variants= [];


            $('#product_step_trigger_1').on('click',function () {
                let _token = $('meta[name="csrf-token"]').attr('content');


               const productId =  $('.product').val();



                $.ajax({
                    url: "{{route('get.product.attributes')}}",
                    type: "POST",
                    data:{
                        _token:_token,
                        productId : productId,
                    },
                    success:function (attributes){
                        $('#attributesDiv').html('')

                        $.each(attributes, function(index, attribute) {
                            $('#attributesDiv').
                            append(
                                '<select name="attributeValues[]"  class="form-control mb-3 attributeValues" id="select'+attribute.id+'">' +
                                '<option  selected   value="" disabled>'+attribute.name +'</option>'+
                                '</select>'+'<br>'
                            )

                            $.each(attribute.values,function (row,value){
                                $('#select'+attribute.id).append('<option value="'+value.id+'" data-attribute-id="'+attribute.id+'">'+ value.name+'-'+attribute.name+'</option>')

                            });
                        })
                    },

                })
                $('#stepper_info_text').text('Ürününüze Ait Adet ,Birim Fiyat ve sectiğiniz öellikleri giriniz birden fazla varyant eklemek için "+" butonuna basınız işleminiz bittikten sonra sonraki adıma geçiniz  ')

            })

            $('#product_step_trigger_2').on('click',function (){




                let  lastObject = $('.btn-add').parents('.entry:last');


                let quantity = lastObject.find($('.quantities')).val();

                let price = lastObject.find($('.prices')).val();


                if (!quantity) {
                    alert('Varyant Adedi Girilmedi')
                    stepper.previous();
                    return false;
                }
                if (!price) {
                    alert('VARYANT Fiyatı Girilmedi')
                    stepper.previous();
                    return false;
                }

                if(!$('option[disabled]:selected').length == 0){

                    alert($('option[disabled]:selected').first().text() +'  SECİNİZ ')
                    stepper.previous();
                    return  false;
                }
                let singleVariant = $('.dynamic-wrap div:first').find('.entry').find('.row');

                $.each(singleVariant, function (index, item) {
                    let quantity = $(this).find('.quantities').val();
                    let price = $(this).find('.prices').val();
                    let variantAttributeAndNames = $(this).find($('.attributeValues')).map(function (index, item) {
                        return $("option:selected", this).text();
                    }).get().join('-');
                    $(this).find($('.attributeValues')).each(function (index,item){
                        variantAttributesTmp.push({
                            "attribute_id":$("option:selected", item).attr('data-attribute-id'),
                            "value_id":$("option:selected", item).val()
                        })
                    });
                    variants.push({

                        "quantity": quantity,
                        "price": price,
                        "variant_name": variantAttributeAndNames,

                        "variantAttributesAndValues": {
                            variantAttributesTmp
                        }


                    });

                    variantAttributesTmp=[];
                });



                let  selectedName = $(".product option:selected").text();
                let    $productName = $('#product_name_label')




                $productName.html('<span class="text-danger"> Ürün Adı : </span>' + ' '  + selectedName);

                $('#productAttributes').html('')
                $.each(variants,function (index,variant){
                    $('#productAttributes').append(
                        '<tr>'+

                        '<td>'+variant.variant_name + '  ' +  selectedName +'</td>'+
                        '<td>'+variant.quantity +' Adet </td>'+
                        '<td>'+variant.price +' TL </td>'+
                        +'<tr>')


                })
                $('#stepper_info_text').text('Eklediğiniz ürüne ve çeşitlere ait bilgilerin özeti listelenmiştir .Eğer dogru ise "Kaydet & Resim Ekle " butonuna basarak resim ekleme ekranına gecebilirsiniz     NOT !: Ürün ve çeşit barkodları otomatik olarak olusturulacaktır      ')

            })

            $('#product_previous_trigger_2').on('click',function (){

                $('#stepper_info_text').text('Varyant Eklemek İstediğiniz Ürünü Seçiniz ')

            });

            $('#product_step_trigger_3').on('click', function (){

                let _token = $('meta[name="csrf-token"]').attr('content');

                const productId =  $('.product').val();



                $.ajax({
                    url: "{{route('variant.store')}}",
                    type: "POST",
                    data: {
                        _token: _token,
                        product_id: productId,
                        variants: variants,

                    },
                    success: function (productId) {

                        window.location.href = '{{route('save.image.for.product.and.variants')}}/' + productId

                    },
                });


            })

            $('#product_previous_trigger_3').on('click', function (){

                variants = [];
                $('#stepper_info_text').text('Eklediğiniz ürüne ve çeşitlere ait bilgilerin özeti listelenmiştir .Eğer dogru ise "Kaydet & Resim Ekle " butonuna basarak resim ekleme ekranına gecebilirsiniz     NOT !: Ürün ve çeşit barkodları otomatik olarak olusturulacaktır      ')

            });


            $(document).on('click', '.btn-add', function (e) {
                e.preventDefault();

                isPrevious = false;
                var dynaDiv = $('.dynamic-wrap div:first'),

                    currentEntry = $('.btn-add').parents('.entry:first');

                let currentObject = $(this).parents('.entry');


                let quantity = currentObject.find($('.quantities')).val();

                let price = currentObject.find($('.prices')).val();


                if (!quantity) {
                    alert('Varyant Adedi Girilmedi')
                    stepper.previous();
                    return false;
                }
                if (!price) {
                    alert('VARYANT Fiyatı Girilmedi')
                    stepper.previous();
                    return false;
                }


                if ($('option[disabled]:selected').length == 0) {
                    let newEntry = $(currentEntry.clone()).appendTo(dynaDiv);
                    newEntry.find('input').val('');
                    dynaDiv.find('.entry:not(:last) .btn-add')
                        .removeClass('btn-add').addClass('btn-remove')
                        .removeClass('btn-success').addClass('btn-danger')
                        .html('<span class="icon fa fa-trash"></span>');

                } else {
                    alert($('option[disabled]:selected').first().text() + '  SECİNİZ ')

                    return false;
                }
            }).on('click', '.btn-remove', function (e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });






        </script>

    @endpush
@endsection
