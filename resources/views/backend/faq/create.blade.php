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

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Sıkca Sorulan Soru Olustur </h3>


        </div>
        <!-- /.card-header -->
        <form action="{{route('faq.store')}}" method="Post" >
            @csrf
           <div class="row">
               <div class="col">
                   <input name="question" class="form-control" type="text" placeholder="Soru">
               </div>

           </div>
            <div class="row">
                <div class="col">
                    <textarea name="answer" placeholder="cevap" class="form-control-lg form-control" rows="10" cols="10"></textarea>
                </div>
            </div>
            <button class="btn btn-success" type="submit"> Soru Ekle</button>
        </form>
    </div>




@endsection
