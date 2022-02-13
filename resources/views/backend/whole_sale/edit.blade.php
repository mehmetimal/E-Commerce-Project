@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endpush
@section('currentPage','Toptan Satış Düzenle ')
@section('current_tab','Toptan satıs Duzenle ')
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

        <form action="{{route('whole_sale.update',$product->id)}}" method="Post"  id="image-form"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col ">
                     <label>{{$product->product->name}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Ürün Açıklaması </label>
                        <input type="text" class="form-control" value="{{$product->description}}" name="description">
                    </div>
                    <div class="col" >
                        <label>Ürün Fİyatı</label>
                        <input type="number" class="form-control" value="{{$product->price}}" name="price">
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary" type="submit" id="submit-all"> Satışa Ürün Ekle  </button>
                </div>
                <!-- /.row -->
            </div>



        </form>
    </div>


    @push('js')



        <!-- Select2 -->
        <script src="{{asset('backend/js/select2.full.min.js')}}"></script>


    @endpush
@endsection
