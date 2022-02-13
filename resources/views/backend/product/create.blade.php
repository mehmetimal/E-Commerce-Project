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
                    <h3 class="card-title">Ürün Eklemek İçin Adımları Takip edin Ve Gerekli Alanları eksiksiz doldurunuz </h3>
                </div>
                <div class="card-body p-0">
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">

                            <!-- your steps here -->
                            <div class="step" data-target="#product_step_1">
                                <button type="button"  class="step-trigger" role="tab" aria-controls="logins-part" >
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Kategori Seçimi  </span>
                                </button>
                            </div>
                            <div class="step" data-target="#product_step_2">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Ürün Hakkında </span>
                                </button>
                            </div>
                            <div class="step" data-target="#product_step_3">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Ürün Detayları</span>
                                </button>
                            </div>
                            <div class="step" data-target="#product_step_4">
                                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Varyasyonlar</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#product_step_5">
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
                                                <label>Kategoriler</label>
                                                <select required class="duallistbox" multiple="multiple">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>

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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Ürün Fiyatı</label>
                                                <input id="product_price" type="text" name="product_price"
                                                       data-inputmask="'alias': 'numeric','negative':false,
                                                  'groupSeparator': '.', 'autoGroup': false, 'digits': 2,
                                                  'digitsOptional': true, 'suffix': '₺ ', 'placeholder': '0'"
                                                       class="form-control" placeholder="Ürün Fiyatı">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1">Ürün Adı</label>

                                            <input type="text" id="name" class="form-control"  placeholder="Ürün Adı ">

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="exampleInputEmail1">Kullanılacak Özellikler</label>
                                            <select id="attribute_ids" name="attributes" class="productAtrributes form-control" multiple >


                                            </select>

                                        </div>
                                        <div class="col">
                                            <label for="exampleInputEmail1">Dükkan</label>

                                        <select class="form-control" id="shop_id" >
                                            @role('Super Admin|Admin')
                                            @foreach($shops as $shop)

                                                <option value="{{$shop->id}}">{{$shop->name}}</option>

                                            @endforeach
                                            @else
                                                <option selected value="{{$shops->id}}">{{$shops->name}}</option>
                                            @endrole

                                        </select>


                                        </div>
                                    </div>
                                </div>
                                <button  id="product_previous_trigger_2"  class="btn btn-primary" onclick="stepper.previous()">Önceki</button>
                                <button  id="product_step_trigger_2" class="btn btn-primary" onclick="stepper.next()">Sonraki</button>

                            </div>



                            <div id="product_step_3" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label >Kısa Açıklama </label>
                                            <input id="short_description" class="form-control form-control-lg" name="short_description" placeholder="Ürün Kısa Açıklaması ">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Vergi</label>
                                            <select id="tax" name="tax" type="text" class="form-control" >
                                                <option value="8">
                                                    %8
                                                </option>
                                                <option value="10">
                                                    %10
                                                </option>
                                                <option value="18">
                                                    %18
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="from-group justify-content-between">
                                            <label>Anasayfada Göster <small>Değiştirmek için yandaki butona tıklayınız </small></label>
                                            <div class="float-right">
                                                <input  id="isSpecial" data-on-text="Göster" data-off-text="Gösterme"   class="float-right" type="checkbox"  name="isSpecial" {{$category->isSpecial==1 ? 'checked' : ''}} data-bootstrap-switch>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="from-group justify-content-between">
                                            <label>Anasayfada Göster <small>Değiştirmek için yandaki butona tıklayınız </small></label>
                                            <div class="float-right">
                                                <input  id="isSlider" data-on-text="Göster" data-off-text="Gösterme"   class="float-right" type="checkbox"  name="isSpecial" {{$category->isSpecial==1 ? 'checked' : ''}} data-bootstrap-switch>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="form-group">
                                        <label>Ürün Uzun açıklamsı  </label>
                                            <textarea id="long_description" class="form-control    form-control-lg mb-3 mt-2"  name="long_description" type="text" placeholder="Varsa Ürün   Açıklaması" >{{old('long_description')}}</textarea>

                                        </div>
                                    </div>
                                </div>


                                <button  id="product_previous_trigger_3" class="btn btn-primary" onclick="stepper.previous()">Önceki</button>
                                <button  id="product_step_trigger_3" class="btn btn-primary" onclick="stepper.next()">Sonraki</button>
                            </div>


                            <div id="product_step_4" class="content" role="tabpanel" aria-labelledby="information-part-trigger">

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
                                    <button id="product_previous_trigger_4" class="btn btn-primary" onclick="stepper.previous()">Önceki</button>
                                    <button  id="product_step_trigger_4" class="btn btn-primary" onclick="stepper.next()">Sonraki</button>

                                </div>

                            </div>

                            <div id="product_step_5" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                <div class="row">
                                    <div class="col">
                                        <h1>Ürün Bilgleri</h1>
                                        <label class="form-control" id="product_name_label"></label>
                                        <label class="form-control" id="product_price_label"></label>
                                        <label class="form-control" id="product_categories_label"></label>
                                        <label class="form-control" id="product_short_description_label"></label>

                                    </div>
                                    <div class="col">
                                    <h1>Ürün Detayları </h1>
                                        <label class="form-control" id="product_isSlider_label"></label>
                                        <label class="form-control" id="product_isSpecial_label"></label>
                                        <label class="form-control" id="product_tax_label"></label>
                                        <label class="form-control" id="product_long_description_label"></label>
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
        <button id="product_previous_trigger_5" class="btn btn-primary" onclick="stepper.previous()">Önceki</button>
        <button id="product_step_trigger_5" type="button" class="btn btn-primary">Kaydet & Resim Ekle </button>
                            </div>

                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <p><b id="stepper_info_text"> En az bir kategori ekleyin -- Eklediğiniz kategori ile kategori aramalarında goronursunuz </b></p>
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
        <script src="{{asset('backend/js/jquery.bootstrap-duallistbox.min.js')}}"></script>

        <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

        {{--initilaize elements--}}

        <script>
        $('input').inputmask({removeMaskOnSubmit: true});
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $('.select2').select2({
            placeholder:"{{__('message.category_root_name')}}",
            width: "resolve"
        })
        $('.productAtrributes').select2({
            placeholder:"Ürün Özellikleri",
            width: "resolve",
            sortResults: function(results, container, query) {
                if (query.term) {
                    // use the built in javascript sort function
                    return results.sort();
                }
                return results;
            }
        })

        $('.attributes').select2({
            placeholder:'Kategorinin hangi özelliklerde Görüneceği',
            width:"resolve",

        })

        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
        $("input[data-bootstrap-switch]").bootstrapSwitch('state', $(this).prop('checked'));

    </script>

        {{--CKEDITOR SCRİPT--}}
<script>
                $( document ).ready(function() {
                CKEDITOR.replace('long_description',{

                    height: 130 ,

                    extraPlugins: ['editorplaceholder','colorbutton,colordialog'],
                    removePlugins: ['sourcearea,SpecialChar','image','language','about','spellchecker','scayt','undo','resize'],
                    removeButtons:'Copy,Cut,Paste,Underline,Subscript,RemoveFormat,Superscript,PasteFromWord,PasteText,Unlink,Outdent,Indent',
                    editorplaceholder: 'Ürün Açıklaması'
                })


            })
</script>

<script>
    let categoryNames=[]
    let isPrevious =false ;
    let categoryIds;
    let attribute_ids;
    let variantAttributesTmp =[];
    let variants= [];
    let productAttributes=[];
    let product={};
    let productDetails={};
    let productCategories = {}
    let shopId;
  $('#product_step_trigger_1').on('click',function () {
      $('.productAtrributes').html('');
     categoryIds = $('.duallistbox').val();
     categoryNames =$('.duallistbox').text();

     if (categoryIds.length === 0){
        alert('en  az 1 Kategori Secilmeldir ')
        stepper.previous();
        return false ;
    }
    $.ajax({
        url: "{{route('getCategoryAttributes')}}",
        type: "POST",
        data:{
            _token:_token,
            categoryIds : categoryIds,
        },
        success:function (attributes){

            $.each(attributes, function(index, attribute) {
                $('.productAtrributes').
                append(
                    '<option value="'+attribute.id+'">' + attribute.name +
                    '</option>'
                    )
                $('.productAtrributes').trigger('change');


            })
    },

})
      $('#stepper_info_text').text('Ürün Fiyatını -Eklemek İstediğiniz Dükkanın adını -ürünün özelliklerini  - Ürünü eklemek istediğiniz dükkanı secin ')

  })

    $('#product_step_trigger_2').on('click',function (){

        $('#attributesDiv').html('')
      let  $name = $('#name'),
       $attribute_ids = $('#attribute_ids'),
       productPrice =  $('#product_price').val();

      shopId=$('#shop_id').val();


       if (!productPrice){
           alert('Ürün Fiyatı Girilmedi !')
           stepper.previous();
           return false
       }

    if (!$name.val()){
        alert('Ürün Adı Boş Olamaz  !')
        stepper.previous();
        return  false;

    }


    if (!$attribute_ids.val().length){
        alert('En Az Bir Özellik Seçilmeli')
        stepper.previous();
        return false;
    }

       if (!shopId){
           alert('Dükkan Seçilmedi !')
           stepper.previous();
           return  false;
       }
       $.ajax({
           url: "{{route('get.attributes.with.values')}}",
           type: "POST",
           data:{
               _token:_token,
               attributeIds : $attribute_ids.val(),
           },
           success:function (attributesAndValues){

                   $.each(attributesAndValues, function(index, attribute) {

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

       $('#stepper_info_text').text('Ürününüz hakkında özet bilgiyi kısa açıklamaya (zoruludur) -Ürününüzün vergisini-Ürünününüzün gorunulurluk ayarlarını göster düğmesine tıklayarak  ürününüz hakınnda detaylı acıklmayı ,se uzun acıklamaya giriniz')

   })

    $('#product_previous_trigger_2').on('click',function (){

        $('#stepper_info_text').text('En az bir kategori ekleyin -- Eklediğiniz kategori ile kategori aramalarında goronursunuz')


    })  ;


    $('#product_step_trigger_3').on('click',function (){

      var shortDescription = $('#short_description').val();


      if(!shortDescription){
          alert('Kısa Açıklama Zorunludur !')
          stepper.previous();
          return false ;
      }
        $('#stepper_info_text').text('Ürününüze Ait Adet ,Birim Fiyat ve sectiğiniz öellikleri giriniz birden fazla varyant eklemek için "+" butonuna basınız işleminiz bittikten sonra sonraki adıma geçiniz  ')


    })

    $('#product_previous_trigger_3').on('click',function (){
        $('#stepper_info_text').text('Ürün Fiyatını -Eklemek İstediğiniz Dükkanın adını -ürünün özelliklerini  - Ürünü eklemek istediğiniz dükkanı secin ')
    });

    $('#product_step_trigger_4').on('click',function (){

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

                productAttributes.push({
                    "attribute_id":$("option:selected", item).attr('data-attribute-id'),
                    "value_id":$("option:selected", item).val()
                })
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


        var isSpecial= $('#isSpecial').is(':checked'),
            isSlider = $('#isSlider').is(':checked'),
            tax      = $('#tax').val(),
            short_description =$('#short_description').val();



        let product_price= $('#product_price').val(),
            product_name =$('#name').val();


        product = {

            "name":product_name,
            "price":product_price,

        }

        productDetails={
            'isSlider':isSpecial ,
            'isSpecial':isSlider,
            'tax':tax,
            'short_description':short_description,
            'long_description': CKEDITOR.instances.long_description.getData() ,
        }
        productCategories ={
            "category_ids":categoryIds
        }



        let    $productName = $('#product_name_label')
        let    $productPriceLabel = $('#product_price_label')
        let $productCategories =$('#product_categories_label')

        $productName.html('<span class="text-danger"> Ürün Adı : </span>' + ' '  + product.name);
        $productPriceLabel.html('<span class="text-danger"> Ürün Fiyatı</span>'+' ' + product.price);
        $productCategories.html('<span class="text-danger"> Ürün Kategorileri</span>'+' ' + categoryNames)

        let $productIsSlider = $('#product_isSlider_label')
        let $productIsSpecial = $('#product_isSpecial_label')
        let $productTax=$('#product_tax_label')
        let $productShortDescriptionLabel = $('#product_short_description_label')
        let $productLongDescriptionLabel= $('#product_long_description_label')

        let  $isSliderForHuman = productDetails.isSlider   ? 'EVET' :'HAYIR'
        let  $isSpecialForHuman =productDetails.isSpecial  ? 'EVET' :'HAYIR'


        $productIsSlider.html('<span class="text-danger">Ürün Ansayafada Gösterilir</span>' + '  ' + $isSliderForHuman);
        $productIsSpecial.html('<span class="text-danger">Ürün Özel Üründür</span>' + '  ' + $isSpecialForHuman);
        $productTax.html('<span class="text-danger">Ürün Vergisi</span>'+ '  ' + '%'+ productDetails.tax);
        $productShortDescriptionLabel.html('<span class="text-danger">Ürün Kısa Açıklaması</span>' + '  ' + productDetails.short_description);
        $productLongDescriptionLabel.html('<span class="text-danger">Ürün  Uzun Açıklamsı</span>' + ' ' + CKEDITOR.instances.long_description.document.getBody().getText() )

        $('#productAttributes').html('')
        $.each(variants,function (index,variant){
            $('#productAttributes').append(
                '<tr>'+

                '<td>'+variant.variant_name + '  ' +  product.name+'</td>'+
                '<td>'+variant.quantity +' Adet </td>'+
                '<td>'+variant.price +' TL </td>'+
                +'<tr>')


        })
        $('#stepper_info_text').text('Eklediğiniz ürüne ve çeşitlere ait bilgilerin özeti listelenmiştir .Eğer dogru ise "Kaydet & Resim Ekle " butonuna basarak resim ekleme ekranına gecebilirsiniz     NOT !: Ürün ve çeşit barkodları otomatik olarak olusturulacaktır      ')

    });

    $('#product_previous_trigger_4').on('click',function (){

        $('#stepper_info_text').text('Ürününüze Ait Adet ,Birim Fiyat ve sectiğiniz öellikleri giriniz birden fazla varyant eklemek için "+" butonuna basınız işleminiz bittikten sonra sonraki adıma geçiniz  ')

    });
    $('#product_step_trigger_5').on('click', function () {
        let _token = $('meta[name="csrf-token"]').attr('content');


        $.ajax({
            url: "{{route('product.store')}}",
            type: "POST",
            data: {
                _token: _token,
                product: product,
                shopId:shopId,
                productDetails: productDetails,
                productAttributes: productAttributes,
                variants: variants,
                productCategories: productCategories,
            },
            success: function (productId) {
               // var myObject = Object.assign({}, response.variant_ids);


                //$('#product_id_for_image').val(productId)

                window.location.href = '{{route('save.image.for.product.and.variants')}}/' + productId





            },
        });
    });
        $('#product_previous_trigger_5').on('click', function () {


            variants = [];
            productAttributes = [];

            $('#stepper_info_text').text('Ürününüze Ait Adet ,Birim Fiyat ve sectiğiniz öellikleri giriniz birden fazla varyant eklemek için "+" butonuna basınız işleminiz bittikten sonra sonraki adıma geçiniz    ')


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
