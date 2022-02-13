@extends('backend.layouts.app')




@push('css')
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('currentPage','Site Ayarları')

@section('content')
    <style>
        .ck-editor__editable
        {
            min-height: 150px !important;
            max-height: 400px !important;
        }
        input[type="file"] {
            display: none;
        }
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
        .image-icon{
            display:inline-block;
            font-size: 100px;
            line-height: 500px;

            width: 100%;
            background-color: whitesmoke;
            text-align: center;
            vertical-align: bottom;
        }
    </style>
    @role('Super Admin')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{route('update.site_setting',$site_settings->id)}}" enctype="multipart/form-data">
                    @csrf

                    <input type="submit" class="btn  btn-success mb-3" value="Ayarları Guncelle">

                    <div class="row">

                        <div class="col-sm-12 col-md-3">
                            <input name="phone" class="form-control form-control-lg" value="{{old('phone',$site_settings->phone ?? '') }}" placeholder="Gsm">
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <input   value="{{old('email',$site_settings->email ?? '')}}"name="email" class="form-control form-control-lg" placeholder="Email">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <input value="{{old('default_title',$site_settings->default_title ?? '')}}" name="default_title" class="form-control form-control-lg" placeholder="SiteBaslıgı">
                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 ">
                            <textarea rows="7" name="default_description" class="form-control form-control-lg"  placeholder="Site Normal Açıklama ">{{old('default_description',$site_settings->default_description ?? '') }}</textarea>
                        </div>

                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 col-md-4">
                            <input value="{{old('facebook',$site_settings->facebook ?? '')}}" name="facebook" class="form-control form-control-lg" placeholder="Facebook">
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <input value="{{old('instagram',$site_settings->instagram ?? '')}}"name="instagram" class="form-control form-control-lg" placeholder="İnstagram">
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <input  value="{{old('pinterest',$site_settings->pinterest ?? '')}}"name="pinterest" class="form-control form-control-lg" placeholder="Pinterest">
                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 col-md-4">
                            <input type="number" value="{{old('cargo_price',$site_settings->cargo_price ?? '')}}" name="cargo_price" class="form-control form-control-lg" placeholder="Kargo Ücreti">
                        </div>

                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <textarea   id="about" name="about"  placeholder="Hakkımızda ">{{old('about',$site_settings->about ?? '')}}</textarea>
                        </div>
                        <div class="col-sm-6" >

                            <div class='image-icon'>
                                <i class='icon-user'></i>
                            </div>

                            @if($site_settings->getFirstMediaUrl('site_logo'))
                                <img  style="min-height:500px;width: 100%;"  src="{{$site_settings->getFirstMediaUrl('site_logo','big')}}"  id="output"/>
                            @else
                                <div class='image-icon'>
                                    <img   class="d-none" style="min-height:500px;width: 100%;"    id="output"/>

                                    <i  id="emptyLogoHolder"class='fa fa-file-image' style="color: black"></i>
                                </div>
                            @endif
                            <label class="custom-file-upload">
                                <input name="logo" type="file" onchange="loadFile(event)"/>
                                Logo Goster
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Mesafeli Satış Sözleşmesi</h4>
                            <textarea name="distance_sales_contract"  id="distance_sales_contract" class="form-control form-control-lg" placeholder="Mesafeli Satış Sözleşmesi">{{old('distance_sales_contract',$site_settings->distance_sales_contract ?? '')}}</textarea>
                        </div>
                        <div class="col-sm-4">
                            <h4>Gizlilik Sözleşmesi</h4>
                            <textarea name="preliminary_information" id="preliminary_information" class="form-control form-control-lg" placeholder="Tüketici Hakları">{{old('preliminary_information',$site_settings->preliminary_information ?? '')}}</textarea>
                        </div>

                        <div class="col-sm-4">
                            <h4>İade Ve Değişim</h4>

                            <textarea name="withdrawal"  id="withdrawal" class="form-control form-control-lg" placeholder="İade Ve Değişim">{{old('withdrawal',$site_settings->withdrawal ?? '')}}</textarea>
                        </div>

                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-sm-12 ">
                            <textarea rows="4" name="address" class="form-control form-control-lg"  placeholder="Site Şirketi Adres ">{{old('address',$site_settings->address ?? '') }}</textarea>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    @endrole
    @push('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{asset('backend/js/customClasses.js')}}"></script>
        <script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>

        <script>
            CKEDITOR.replace('about',{

                height: 393 ,
                autoGrow_maxHeight: 393,
                extraPlugins: ['editorplaceholder','colorbutton,colordialog','autogrow'],
                removePlugins: ['sourcearea,SpecialChar','image','language','about','spellchecker','scayt','undo','resize'],
                removeButtons:'Copy,Cut,Paste,Underline,Subscript,RemoveFormat,Superscript,PasteFromWord,PasteText,Unlink,Outdent,Indent',
                editorplaceholder: 'Hakkımızda Yazısı'
            })
            CKEDITOR.replace('distance_sales_contract',{

                height: 350 ,
                autoGrow_maxHeight: 350,
                extraPlugins: ['editorplaceholder','colorbutton,colordialog','autogrow'],
                removePlugins: ['sourcearea,SpecialChar','image','language','about','spellchecker','scayt','undo','resize'],
                removeButtons:'Copy,Cut,Paste,Underline,Subscript,RemoveFormat,Superscript,PasteFromWord,PasteText,Unlink,Outdent,Indent',
                editorplaceholder: 'Mesafeli Satış Sözleşmesi'
            })
            CKEDITOR.replace('withdrawal',{

                height: 350 ,
                autoGrow_maxHeight: 350,
                extraPlugins: ['editorplaceholder','colorbutton,colordialog','autogrow'],
                removePlugins: ['sourcearea,SpecialChar','image','language','about','spellchecker','scayt','undo','resize'],
                removeButtons:'Copy,Cut,Paste,Underline,Subscript,RemoveFormat,Superscript,PasteFromWord,PasteText,Unlink,Outdent,Indent',
                editorplaceholder: 'İade Ve Değişim Kosulları'
            })
            CKEDITOR.replace('preliminary_information',{

                height: 350 ,
                autoGrow_maxHeight: 350,
                extraPlugins: ['editorplaceholder','colorbutton,colordialog','autogrow'],
                removePlugins: ['sourcearea,SpecialChar','image','language','about','spellchecker','scayt','undo','resize'],
                removeButtons:'Copy,Cut,Paste,Underline,Subscript,RemoveFormat,Superscript,PasteFromWord,PasteText,Unlink,Outdent,Indent',
                editorplaceholder: 'Gizlilik Kosulları'
            })
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                    $('#emptyLogoHolder').hide();
                    $('#output').removeClass('d-none');
                }
            };
        </script>
    @endpush
@endsection



