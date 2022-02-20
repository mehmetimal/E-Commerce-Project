<!--category menu-->
<div class="kalles-section cat-shop pr tc">
    {{--
        <a href="#" class="has_icon cat_nav_js dib">Kategoriler <i class="facl facl-angle-down"></i></a>
    --}}
    <div class="d-inline" id="cat_kalles">
        <ul class="  list-inline">
            @foreach($descants as $category)
                <li class=" list-inline-item"><a class="cat_link " href="{{route('shopping',$category->id)}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<!--end category menu-->
