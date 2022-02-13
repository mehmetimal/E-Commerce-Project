@extends('backend.layouts.app')

@section('currentPage','Resim Ekle')
@section('current_tab',__('message.add_category'))

@section('content')
    <style>

        .imagePreview {
            width: 100%;
            height: 600px;
            background-position: center center;
            background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
            background-color:#fff;
            background-size: cover;
            background-repeat:no-repeat;
            display: inline-block;
            box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
        }
        .imagePreviewVariant{

            width: 100%;
            height: 600px;



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



    {{--ÜRÜN RESMİ KAYDETME --}}




    {{--  <div class="card card-primary shadow-lg">

         <div class="card-header">
              <h3 class="card-title">Ürün Kapak Resmi</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
              </div>
              <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="{{route('upload.product.covers')}}" method="POST" enctype="multipart/form-data">
             @csrf
              <div class="container ">
                  <div class="row  text-center">
                      <div class="col-sm-6 imgUp productCover">
                          <div class="imagePreview" style="background: url({{$product->image[0] ?? asset('backend/images/image_holder.png')}});background-repeat: no-repeat;background-position: center center;background-size: cover;width: 100%;height: 600px" ></div>
                          <label class="btn btn-primary ">
                              Kapak Resmi Seç <input name="images[]"  type="file" class="uploadFile img " value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                          </label>
                      </div><!-- col-2 -->
                      <div class="col-sm-6 imgUp productCover">
                          <div class="imagePreview" style="background: url({{$product->image[1] ?? asset('backend/images/image_holder.png')}});background-repeat: no-repeat;background-position: center center;background-size: cover;width: 100%;height: 600px" ></div>

                          <label class="btn btn-primary ">
                              Kapek Resimi Seç<input name="images[]"  type="file" class="uploadFile img " value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                          </label>

                      </div><!-- col-2 -->
                      --}}{{--<i class="fa fa-plus imgAdd"></i>--}}{{--
                  </div><!-- row -->
              </div><!-- container -->
              <button type="submit" class="btn btn-success form-control">KAPAK RESMİ KAYDET</button>
          </form>
          </div>




      </div>--}}


    @foreach($variants as $variant)
        {{--VARYANT RESMİ KAYDETME --}}

        <div class="card card-primary shadow-lg">

            <div class="card-header">
                <h3 class="card-title">{{$variant->name}} - {{$variant->product->name}} </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="">
                    <div class="row">


                        @for($i=0;$i<=3 ;$i++)
                            <div class="col-sm-6 col-md-6  imgUp">

                                <div class="imagePreviewVariant "  style="background: url({{isset($variant->getMedia('variants')[$i] ) ?$variant->getMedia('variants')[$i]->getUrl('big')  : asset('backend/images/image_holder.png')}});;background-repeat:no-repeat;background-size: cover; background-position:center center;  width: 100%;height:600px;"></div>

                                @if(!isset($variant->getMedia('variants')[$i]))
                                    <form action="{{route('upload.variant.image',$variant->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label class="btn btn-primary">
                                            Varyant Resmi Goruntüle<input name="image" type="file" class="uploadFileVariant img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                        <button class="btn btn-success form-control">Yükle</button>
                                    </form>
                                @else
                                    <form action="{{route('delete.variant.media',$variant->getMedia('variants')[$i]->id)}}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger form-control">Sil</button>

                                    </form>

                                @endif
                            </div><!-- col-2 -->

                        @endfor
                    </div>
                </div><!-- row -->
            </div><!-- container -->

        </div>
        <!-- /.card-body -->






    @endforeach

    <script src="{{asset('backend/js/jquery.min.js')}}"></script>

    <script>
        $(function() {
            $(document).on("change",".uploadFileVariant", function()
            {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){ // set image data as background of div
                        uploadFile.closest(".imgUp").find('.imagePreviewVariant').css("background-image", "url("+this.result+")");
                    }
                }

            });
        });
    </script>

@endsection
