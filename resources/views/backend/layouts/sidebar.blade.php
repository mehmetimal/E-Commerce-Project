<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-light">Moda Terapim Panel </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                @role('Super Admin|Admin')
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            {{__('message.order_refund_sidebar_title')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('order.index')}}" class="nav-link active">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>  Siparişler </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-undo nav-icon"></i>
                             <p> İadeler </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole
                @can('Read Category')
                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                        <p> {{__('message.category_text')}}</p>
{{--
                            <span class="right badge badge-danger">{{__(('message.new_text'))}}</span>
--}}

                    </a>
                </li>
                @endcan
                @can('Read Attribute')
                <li class="nav-item">
                    <a href="{{route('attribute.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-random" ></i>
                        <p>
                        <p> {{__('message.attribute_sidebar_text')}}</p>
{{--
                        <span class="right badge badge-danger">{{__(('message.new_text'))}}</span>
--}}

                    </a>
                </li>
                @endcan
                @can('Read Product')
                    <li class="nav-item">
                                 <a href="{{route('product.index')}}" class="nav-link">
                                     <i class="nav-icon fab  fa-product-hunt"></i>
                                     <p>
                                     <p> Ürünler </p>
{{--
                                     <span class="right badge badge-danger">{{__(('message.new_text'))}}</span>
--}}

                                 </a>
                             </li>
                @endcan
                @can('Read Variant')
                <li class="nav-item">
                      <a href="{{route('variant.index')}}" class="nav-link">
                          <i class="nav-icon fa fa-shopping-basket "></i>
                          <p>
                          <p> Varyantlar  </p>
{{--
                          <span class="right badge badge-danger">Yeni</span>
--}}

                      </a>
                  </li>
                @endcan
                @can('Read Role')
                <li class="nav-item">
                    <a href="{{route('role.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>
                        <p> Roller   </p>
                    {{--    <span class="right badge badge-danger">Yeni</span>--}}

                    </a>
                </li>
                @endcan
                @can('Read Permission')
                    <li class="nav-item">
                    <a href="{{route('permission.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                        <p> İzinler    </p>
                       {{-- <span class="right badge badge-danger">Yeni</span>--}}
                    </a>
                </li>
                @endcan
                @can('Read User')
                <li class="nav-item">
                   <a href="{{route('user.index')}}" class="nav-link">
                       <i class="nav-icon fa fa-users"></i>
                       <p>
                       <p> Kullanıcılar   </p>
                     {{--  <span class="right badge badge-danger">Yeni</span>--}}

                   </a>
               </li>
                @endcan
                @can('Read Shop')
                <li class="nav-item">
                    <a href="{{route('shop.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-store"></i>
                        <p>
                        <p> Dükkanlar </p>
                     {{--   <span class="right badge badge-danger">Yeni</span>--}}

                    </a>
                </li>
               @endcan
                @role('Super Admin')
                <li class="nav-item">
                    <a href="{{route('site_setting.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                        <p> Site Ayarları    </p>
                       {{-- <span class="right badge badge-danger">Yeni</span>--}}

                    </a>
                </li>
                @endrole
                @can('Read Contact')
                <li class="nav-item">
                    <a href="{{route('contact.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-phone"></i>
                        <p>
                        <p> İletişim İstekleri   </p>
            {{--            <span class="right badge badge-danger">Yeni</span>--}}

                    </a>
                </li>
                @endcan
                @can('Read Faq')
                <li class="nav-item">
                    <a href="{{route('faq.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-question-circle"></i>
                        <p>
                        <p> Sıkça Sorulan Sorular   </p>
                 {{--       <span class="right badge badge-danger">Yeni</span>--}}

                    </a>
                </li>
                @endcan
                @can('Read Whole_Sale')
                    <li class="nav-item">
                    <a href="{{route('whole_sale.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-industry"></i>
                        <p>
                        <p> Toptan Satış   </p>
                      {{--  <span class="right badge badge-danger">Yeni</span>--}}

                    </a>
                </li>
                @endcan
                @role('Super Admin|Admin')
                    <li class="nav-item">
                        <a href="{{route('site_rating.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-industry"></i>
                            <p>
                            <p> Site Yorumları    </p>
                            {{--  <span class="right badge badge-danger">Yeni</span>--}}

                        </a>
                    </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
