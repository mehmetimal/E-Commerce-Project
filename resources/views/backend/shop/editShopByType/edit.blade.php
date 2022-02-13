@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endpush
@section('currentPage','Dükkan Guncelle')
@section('current_tab','Dükkan Guncelle  ')
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
        .uploadShop{

            width: 100%;
            height: 100px;



            display: inline-block;
            box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
        }

        .btn-primary
        {
            display:block;
            border-radius:0px;
            box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
            margin-top:-5px;
        }
        .imgUp
        {
            margin-bottom:15px;
        }

    </style>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Dükkan Bilgilerini Listelenmiştir   </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <form action="{{route('shop.update',$shop->id)}}" method="Post"  id="image-form"  enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group ">
                                <label>Dükkan İsmi </label>
                                <input  class="form-control"  name="name"  value="{{$shop->name}}" type="text" placeholder="Dükkan Uzun İsimi ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group ">
                                <label>Takma İsim örn : modaterapim </label>
                                <input  class="form-control"  name="nick_name" value="{{$shop->nick_name}}" type="text" placeholder="Dükkan Kısa Takma İsim">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-sm-6 col-md-6  imgUp">

                            <div class="uploadShop"  style="background: url({{$shop->getFirstMediaUrl('shop_logos','big')}});;background-repeat:no-repeat;background-size: cover; background-position:center center;  width: 100%;height:300px;"></div>

                            <label class="btn btn-primary">
                                Dükkan Logosu Göster <input name="image" type="file" class="uploadShop img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary" type="submit" id="submit-all"> Dükkan Güncelle </button>
                </div>
                <!-- /.row -->
            </div>
        </form>
    </div>
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>

    <script>
        $(function() {
            $(document).on("change",".uploadShop", function()
            {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){ // set image data as background of div
                        uploadFile.closest(".imgUp").find('.uploadShop').css("background-image", "url("+this.result+")");
                    }
                }

            });
        });
    </script>

@endsection
