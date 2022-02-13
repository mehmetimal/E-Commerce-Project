@extends('backend.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{asset('backend/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/select2-bootstrap4.min.css')}}">
@endpush
@section('currentPage',__('message.add_category'))
@section('current_tab',__('message.add_category'))
@section('content')

    <div class="card card-default">

        <div class="row">
            <div class="col">
                <label>{{$contact->name}}-{{$contact->surname}}</label>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <label>{{$contact->message}}</label>
            </div>
        </div>

    </div>


    @push('js')


        <!-- Bootstrap Switch -->
        <script src="{{asset('backend/js/bootstrap-switch.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('backend/js/select2.full.min.js')}}"></script>



    @endpush
@endsection
