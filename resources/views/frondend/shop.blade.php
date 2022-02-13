@extends('frondend.layouts.app')
@section('banner_title', $category->name)
@section('banner_text', $category->name .' e  Ait Ürünler Listelenmiştir isterseniz filtreleme bölümünden ürünleri filtreleyebilirsiniz ')

@section('content')


    <!--category menu-->
    <div class="kalles-section cat-shop pr tc">
        <a href="#" class="has_icon cat_nav_js dib">Categories<i class="facl facl-angle-down"></i></a>
        <div class="dn" id="cat_kalles">
            <ul class="cat_lv_0">
                @foreach($descendantsOfCategory as $descendants)
                    <li class="cat-item"><a class="cat_link dib" href="{{route('shopping',$descendants->id)}}">{{$descendants->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container container_cat nt_pop_sidebar cat_default mb__20">

        @include('frondend.layouts.filterControl')

        @include('frondend.layouts.dynamicFilter')

            @include('frondend.layouts.variantList')


    </div>

@endsection