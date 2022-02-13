<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
          content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Moda Terapim | Kullanıcı Profilim </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frondend/profile/css/favicon.png')}}">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('frondend/profile/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frondend/profile/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('frondend/profile/css/morris.css')}}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{asset('frondend/profile/css/c3.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('frondend/profile/css/style.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('frondend/profile/css/dashboard1.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('frondend/profile/css/default.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Kullanıcı</p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->

            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                             href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>

                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->

            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li> <a class="waves-effect waves-dark" href="{{route('profile')}}" aria-expanded="false"><i
                                class="fa fa-tachometer"></i><span class="hide-menu">Siparişlerim</span></a>
                    </li>

                </ul>
                <div class="text-center mt-4">
                    <a href="https://wa.me/{{$site_setting->phone}}?text=Merhaba%20Bir%20Konuda%20Bilgi%20Almak%20İstiyorum"
                       class="btn waves-effect waves-light btn-info  text-white w-50"> Whatsupp İletişim </a><br>
                    <a href="{{$site_setting->instagram}}"
                       class="btn waves-effect waves-light btn-info  text-white w-50"> İnstagram Hesabımız</a><br>
                    <a href="{{$site_setting->facebook}}"
                       class="btn waves-effect waves-light btn-info  text-white w-50"> Facebook</a><br>
                    <a href="{{$site_setting->pinterest}}"
                       class="btn waves-effect waves-light btn-info text-white w-50"> Pinterest</a><br>
                </div>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Profilim</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Profilim</a></li>
                        <li class="breadcrumb-item active">Siparişlerim</li>
                    </ol>
                </div>
                <div class="col-md-7 align-self-center">
                    <a href="https://wa.me/{{$site_setting->phone}}?text=Merhaba%20Bir%20Konuda%20Bilgi%20Almak%20İstiyorum"
                       class="btn waves-effect waves-light btn btn-info pull-right  text-white"> Whatssupp İletişim</a>
                </div>
            </div>
            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2021 ModaTerapim  <a href="">Mehmet İmal.</a> Tüm Hakları Saklıdır  </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('frondend/profile/js/jquery.min.js')}}"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{asset('frondend/profile/js/bootstrap.bundle.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('frondend/profile/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('frondend/profile/js//waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('frondend/profile/js//sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('frondend/profile/js/custom.min.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{asset('frondend/profile/js/raphael-min.js')}}"></script>
<script src="{{asset('frondend/profile/js/morris.min.js')}}"></script>
<!--c3 JavaScript -->
<script src="{{asset('frondend/profile/js/d3.min.js')}}"></script>
<script src="{{asset('frondend/profile/js/c3.min.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('frondend/profile/js/dashboard1.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('message'))
   <script>
       Swal.fire({
           position: 'top-end',
           icon: 'success',
           title: '{{\Illuminate\Support\Facades\Session::get('message')}}',
           showConfirmButton: false,
           timer: 1500
       })
   </script>




@endif
</body>

</html>
