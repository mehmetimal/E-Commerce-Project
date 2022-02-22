@extends('frondend.layouts.app')
@section('banner_title', 'Hosgeldiniz')
@section('banner_text')
@section('content')

    <div class="container container_cat nt_pop_sidebar cat_default mb__20">

       @include('frondend.layouts.filterControl')

       @include('frondend.layouts.indexFilter')

         <div id="variantList">
        <!--product container-->
        @include('frondend.layouts.variantList')
        <!--end product container-->
         </div>
    </div>


@endsection
