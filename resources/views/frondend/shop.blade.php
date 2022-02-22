@extends('frondend.layouts.app')
@section('banner_title', $category->name)
@section('banner_text', $category->name .' e  Ait Ürünler Listelenmiştir isterseniz filtreleme bölümünden ürünleri filtreleyebilirsiniz ')

@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">{{$category->name }} -></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">


                @foreach($descendantsOfCategory as $descendant)

                    <li class="nav-item dropdown "  >
                    <a class="nav-link dropdown"  href="{{route('shopping',$descendant->id)}}" >

                      @if(Str::startsWith($descendant->name, 'Kadın') || Str::startsWith($descendant->name, 'Erkek') ||Str::startsWith($descendant->name, 'Kadın'))
                          {{strstr($descendant->name," ")}}
                        @else
                          {{$descendant->name}}
                        @endif


                    </a>




                </li>
                @endforeach
            </ul>

        </div>
    </nav>


    <!--category menu-->
    <div class="kalles-section cat-shop pr tc">
     {{--   <div class="kalles-section cat-shop pr tc">
            <div class="d-inline" id="cat_kalles">
                <ul class="  list-inline">
                @foreach($descendantsOfCategory as $descendants)
                 <li class=" list-inline-item"><a class="cat_link dib" href="{{route('shopping',$descendants->id)}}">{{$descendants->name}}</a></li>
                @endforeach
            </ul>

        </div>

    </div>--}}

    <div class="container container_cat nt_pop_sidebar cat_default mb__20">

        @include('frondend.layouts.filterControl')

        @include('frondend.layouts.dynamicFilter')
        <div id="variantList">


                @include('frondend.layouts.variantList')
        </div>

    </div>

@endsection
