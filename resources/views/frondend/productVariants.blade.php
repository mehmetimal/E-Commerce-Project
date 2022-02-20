@extends('frondend.layouts.app')
@section('banner_title', $product->name)
@section('banner_text', $product->name .' Ürünüe Ait Çeşitlerimiz Aşağıdadır   ')

@section('content')


    <!--category menu-->
    <div class="kalles-section cat-shop pr tc">
        <div class="d-inline" id="cat_kalles">
            <ul class="  list-inline">
            <ul class="cat_lv_0">
                @foreach($categories  as $category)
                    <li class=" list-inline-item"><a class="cat_link dib" href="{{route('shopping',$category->id)}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container container_cat nt_pop_sidebar cat_default mb__20">

            @include('frondend.layouts.filterControl')

            @include('frondend.layouts.dynamicFilter')

            <div id="variantList">
                @include('frondend.layouts.variantList')
            </div>
    </div>

@endsection
