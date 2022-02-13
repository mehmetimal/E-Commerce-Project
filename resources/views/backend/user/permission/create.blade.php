@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endpush
@section('currentPage','İzin Ekle')
@section('current_tab','İzin   Ekle ')
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
            <h3 class="card-title">İzin ismi gir  </h3>

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
        <form action="{{route('permission.store')}}" method="Post"  id="image-form"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group ">
                                    <label>İzin  Ekle </label>
                                    <input  class="form-control"  name="name" type="text" placeholder="İzin  Adı">
                                </div>
                            </div>
                        </div>




                </div>
                <div class="row">
                    <button class="btn btn-primary" type="submit" id="submit-all"> İzin  Ekle  </button>
                </div>
                <!-- /.row -->
            </div>

        </form>
    </div>



@endsection
