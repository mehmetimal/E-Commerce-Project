@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">
@endpush
@section('currentPage',__('message.add_category'))
@section('current_tab',__('message.add_category'))
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
            <h3 class="card-title">@lang('message.category_info_text')</h3>

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
        <form action="{{route('category.update',$category->id)}}" method="Post"  id="image-form"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12">


                            <div class="form-group">
                                <div class="form-group ">
                                    <label>Anasayfada Göster </label>
                                    <input  data-on-text="Göster" data-off-text="Gösterme"   class="float-right" type="checkbox"  name="isSpecial" {{$category->isSpecial== 1 ? 'checked' : ''}} data-bootstrap-switch>

                                </div>
                                <label>{{__(('message.category_name'))}}</label>
                                <div class="form-group">
                                    <input id="category_name"  class="form-control-lg  form-control" name="name" value="{{old('name',$category->name)}}" placeholder="{{__(('message.category_name'))}}">


                                </div>

                                @if($errors->has('name'))
                                    <div class="error text-danger "><b>{{ $errors->first('name') }}</b></div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                @if(! $category->isRoot())
                                <label>@lang('message.if_root_category_exist')</label>

                                <select name="parent_id" class="form-control form-control-lg select2 p-5"   style="width: 100%;">


                                    <option value="root"><b>Kategoriyi Üst Kategori Yap </b></option>

                                    @foreach($categories as $singleCategory)
                                        <option
                                            @foreach($category->ancestors as $ancestor)
                                            {{$singleCategory -> id  == $ancestor->id ? 'selected': ''}}
                                            {{$category -> id == $singleCategory->id ? 'disabled' : ''}}
                                            {{$singleCategory->name}}
                                            @endforeach
                                            value="{{$singleCategory->id}}" >
{{$singleCategory->name}}
                                        </option>
                                    @endforeach

                                </select>
                                <small><b>Sadece 1 Adet üst Kategori Seçilebilir</b></small>
                                @else
                               <small class="text-center align-items-center"><b> Üst Kategoriyi Taşı  </b></small>
                                    <select name="parent_id" class="form-control form-control-lg select2 p-5"   style="width: 100%;">
                                        <option ></option>
                                    @foreach($categories as $singleCategory)
                                        <option
                                            {{$category -> parent_id == $singleCategory->id ? 'selected="selected"': ''}}
                                            {{$category -> id == $singleCategory->id ? 'disabled="disabled"': ''}}
                                            value="{{$singleCategory->id}}" >
                                            {{$singleCategory->name}}
                                        </option>
                                    @endforeach
                                    </select>



                                @endif
                            </div>

                        </div>


                    </div>
                    <div class="col-6 mt-5">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__(('message.category_slogan'))}}</label>
                                <div class="form-group">
                                    <input id="category_name" class="form-control-lg  form-control" name="category_slogan" value="{{old('category_slogan',$category->slogan)}}"
                                           placeholder="{{__(('message.category_slogan'))}}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>@lang('message.category_attributes')</label>


                                <select name="attribute_ids[]" class="form-control form-control-lg attributes p-5" multiple   style="width: 100%;">
                                    @foreach($attributes as $attribute)



                                        <option value="{{$attribute->id}}"
                                            @foreach($category->attributes as $categoryAttribute)
                                                {{$categoryAttribute->pivot->attribute_id == $attribute->id ? 'selected="selected"': ''}}

                                            @endforeach
                                        > {{$attribute->name}}


                                        </option>

                                            @endforeach
                                </select>

                                @if($errors->has('attribute_ids'))
                                    <div class="error text-danger "><b>{{ $errors->first('attribute_ids') }}</b></div>
                                @endif
                            </div>

                        </div>

                    </div>
                    <div class="col-12 my-2">
                        <input value="{{old('description',$category->description)}}"  name="description" class="form-control form-control-lg" placeholder="Kategori Açıklaması" >
                    </div>
                </div>

                <!-- /.row -->
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <hr>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"><b>@lang('message.if_category_image_exist')</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="ml-2 col-sm-6">
                                <div id="msg"></div>

                                <input type="file" name="image" class="file" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="text" class="form-control" disabled placeholder="@lang('message.picture') @lang('message.show_text') " id="file">
                                    <div class="input-group-append">
                                        <button type="button" class="browse btn btn-primary">@lang('message.show_text')</button>
                                    </div>
                                </div>

                            </div>
                            <div class="ml-2 col-sm-6">
                                <img src="{{$category->getFirstMediaUrl('categories') ?? ''}}" id="preview" class="img-thumbnail">
                            </div>




                            <!-- /.card-body -->
                            <div class="card-footer">
                                <b>@lang('message.picture_limit_1')</b>
                            </div>
                            <div class="row my-3">
                                <button class="btn btn-primary" type="submit" id="submit-all"> Kategori Güncelle</button>
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


        <script>
            //Initialize Select2 Elements
            $('.select2').select2({
                placeholder:"{{__('message.category_root_name')}}",
                width: "resolve"
            })

            $('.attributes').select2({
                placeholder:'Kategorinin hangi özelliklerde Görüneceği',
                width:"resolve",

            })

            $(document).on("click", ".browse", function() {
                var file = $(this).parents().find(".file");
                file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });



            $("input[data-bootstrap-switch]").bootstrapSwitch('state', $(this).prop('checked'));



        </script>
    @endpush
@endsection
