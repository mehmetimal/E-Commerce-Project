@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endpush
@section('currentPage','Urun Düzenle'))
@section('current_tab','Ürün Düzenle')
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
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"> {{$product->name}} -{{$product->quantity}} Adet  </h3>
            <h3 class="card-title float-right"> {{$product->is_published == 1 ? 'Yayında !':'Yayında Değil '}} </h3>

        </div>
        <!-- /.card-header -->
        <form action=" {{route('product.update',$product->id)}} " method="Post" >
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12">
                            <div class="form-group">

                                <label>Ürün Adı </label>
                                <div class="form-group">

                                    <input   class="form-control-lg  form-control" name="name" value="{{$product->name}}" >


                                </div>
                                {{--<div class="form-group ">
                                    <label>Anasayfada Göster </label>
                                   <label class="float-right">
                                       <input {{$product->detail->isSlider==1 ? 'checked' : ''}} data-on-text="Göster" data-off-text="Gösterme"   class="float-right" type="checkbox"  name="isSldier" data-bootstrap-switch>
                                   </label>

                                </div>--}}
                                @if($errors->has('name'))
                                    <div class="error text-danger "><b>{{ $errors->first('name') }}</b></div>
                                @endif
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-6">


                        <label>Ürün Fiyatı </label>
                        <div class="form-group">

                            <input type="number" id=""  class="form-control-lg  form-control" name="price" value="{{$product->price}}" >


                        </div>
                      {{--  <div class="form-group ">
                            <label>Özel Ürün Mü  </label>
                           <label class="float-right">


                            <input {{$product->detail->isSpecial==1 ? 'checked' : ''}} data-on-text="Göster" data-off-text="Gösterme"   class="float-right" type="checkbox"  name="isSpecial" data-bootstrap-switch>
                           </label>
                        </div>--}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label>Kısa Açıklama </label>
                        <div class="form-group">
                            <input type="text"  name="short_description"  class="form-control" value="{{$product->detail->short_description}}" >
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Ürün  Kategorileri  </label>
                        <div class="form-group">
                            <select name="category_id"class="form-control categories">
                           @foreach($categories as $category)
                           <option value="{{$category->id}}"


                               {{$product->category_id== $category->id ? 'selected' :''}}>
                               {{$category->name}}
                            </option>
                           @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <textarea name="long_description" class="form-control" placeholder="Uzun Açıklama ">{!!$product->detail->long_description!!}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <div class="row my-3">
                                <button class="btn btn-primary" type="submit" id="submit-all"> Ürün  Güncelle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    @push('js')


        <!-- Bootstrap Switch -->
        <script src="{{asset('backend/js/bootstrap-switch.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('backend/js/select2.full.min.js')}}"></script>


        <script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>

<script>
    $("input[data-bootstrap-switch]").bootstrapSwitch('state', $(this).prop('checked'));




    $( document ).ready(function() {
        CKEDITOR.replace('long_description',{

            height: 130 ,

            extraPlugins: ['editorplaceholder','colorbutton,colordialog'],
            removePlugins: ['sourcearea,SpecialChar','image','language','about','spellchecker','scayt','undo','resize'],
            removeButtons:'Copy,Cut,Paste,Underline,Subscript,RemoveFormat,Superscript,PasteFromWord,PasteText,Unlink,Outdent,Indent',
            editorplaceholder: 'Ürün Açıklaması'
        })


    })
    $('.categories').select2({
        placeholder:'Ürün Kategorileri ',
        width:"resolve",

    })
</script>
    @endpush
@endsection
