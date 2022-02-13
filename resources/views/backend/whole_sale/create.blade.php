@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">

    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
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

        <form action="{{route('whole_sale.store')}}" method="Post"  id="image-form"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-4">
                 <div class="col ">
                     <select  name="product_id" class="form-control">
                         <option>Ürün Seç</option>
                         @foreach($products as $product)
                         <option value="{{$product->id}}" >
                            {{$product->name}}
                         </option>
                         @endforeach
                     </select>
                 </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Ürün Açıklaması </label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="col" >
                        <label>Ürün Fİyatı</label>
                        <input type="number" class="form-control" name="price">
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
