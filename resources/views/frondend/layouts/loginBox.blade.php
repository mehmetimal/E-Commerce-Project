
<!-- login box -->

<div id="nt_login_canvas" class="nt_fk_canvas lazyload">
    @guest
        <form id="customer_login" class="nt_mini_cart flex column h__100 is_selected" action="{{route('login')}}"method="POST">
            @csrf
            <div class="mini_cart_header flex fl_between al_center">
                <div class="h3 widget-title tu fs__16 mg__0">Giriş</div>
                <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
            </div>
            <div class="mini_cart_wrap">
                <div class="mini_cart_content fixcl-scroll">
                    <div class="fixcl-scroll-content"><p class="form-row">
                            <label for="CustomerEmail">Email Adresi<span class="required">*</span></label>
                            <input type="email" name="email" id="CustomerEmail" autocomplete="email" autocapitalize="off">
                        </p>
                        <p class="form-row">
                            <label for="CustomerPassword">Şifre <span class="required">*</span></label>
                            <input type="password" value="" name="password" autocomplete="current-password" id="CustomerPassword">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Sonraki Girişlerim İçin Beni  Hatırla ') }}
                            </label>
                        </div>
                        </p>
                        <input type="submit" class="button button_primary w__100 tu js_add_ld" value="GiriŞ Yap">

                        <br>
                        <p class="mb__10 mt__20">Üye Değil Misin ?
                            <a href="#" data-id="#RegisterForm" class="link_acc">Tıkla Üye Ol </a>
                        </p>
                        <p>Şifreni Mi Unuttun
                            <a href="#" data-id="#RecoverForm" class="link_acc">Tıkla Şİfreni Yenile </a>
                        </p>
                    </div>
                </div>
            </div>
        </form>

        <form id="RecoverForm"  method="POST" action="{{ route('password.email') }}" class="nt_mini_cart flex column h__100">
            @CSRF
            <div class="mini_cart_header flex fl_between al_center">
                <div class="h3 widget-title tu fs__16 mg__0">Şifremi Yenile </div>
                <i class="close_pp pegk pe-7s-close ts__03 cd"></i></div>
            <div class="mini_cart_wrap">
                <div class="mini_cart_content fixcl-scroll">
                    <div class="fixcl-scroll-content">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="form-row">
                            <label for="RecoverEmail">Email adresi</label>
                            <input type="email" value="" name="email" id="RecoverEmail" class="input-full" autocomplete="email" autocapitalize="off">
                        </p>
                        <input type="submit" class="button button_primary w__100 tu js_add_ld" value="Bana Yenileme Emaili Gönder ">
                        <br>
                        <p class="mb__10 mt__20">Remembered your password?
                            <a href="#" data-id="#customer_login" class="link_acc">Back to login</a>
                        </p>
                    </div>
                </div>
            </div>
        </form>


        <form id="RegisterForm" class="nt_mini_cart flex column h__100 " method="POST" action="{{route('register')}}" novalidate>
            @csrf

            <div class="mini_cart_header flex fl_between al_center">
                <div class="h3 widget-title tu fs__16 mg__0">Üye Ol </div>
                <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
            </div>
            <div class="mini_cart_wrap">
                <div class="mini_cart_content fixcl-scroll">
                    <div class="fixcl-scroll-content">
                        <p class="form-row">
                            <label for="-email">Email  Adresi <span class="required">*</span></label>
                            <input type="email" name="email" id="-email" autocapitalize="off" autocomplete="email" aria-required="true">

                        </p>
                        <p class="form-row">
                            <label for="">Şifre  <span class="required">*</span></label>

                            <input type="password" name="password" id="password" class="" autocomplete="current-password" aria-required="true">

                        </p>
                        <p class="form-row">
                            <label for="-password">Şifre  Tekrarı <span class="required">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="" autocomplete="current-password" aria-required="true">
                        </p>
                        <input type="submit" value="Üye Ol " class="button button_primary w__100 tu js_add_ld">
                        <br>
                        <p class="mb__10 mt__20">Zaten Üye Misin ?
                            <a href="#" data-id="#customer_login" class="link_acc">Tıkla Giriş Yap</a>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    @else

        <div  class="nt_mini_cart flex column h__100 is_selected" >

            <div class="mini_cart_header flex fl_between al_center">
                <div class="h3 widget-title tu fs__16 mg__0">Hoşgeldin</div>
                <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
            </div>
            <div class="mini_cart_wrap">
                <div class="mini_cart_content fixcl-scroll">
                    <div class="fixcl-scroll-content text-center d-flex   justify-content-center align-self-center">

                        <a href="{{route('profile')}}" class="button button_primary text-center w__60  justify-content-center align-self-center">PROFİLİME GİT <i class="iccl iccl-user"></i></a>

                        <form action="{{route('logout')}}" method="POST" class=" text-center w__60  justify-content-center align-self-center">
                            @csrf
                            <button class="button   button_primary "> Güvenli Çıkış  <i class="fa fa-sign-out"></i> </button>
                        </form>
                        @role('Super Admin|Shop|Admin')
                        <a href="{{route('dashboard')}}" class="button button_primary text-center w__60  justify-content-center align-self-center">Yönetim Paneli <i class="iccl iccl-user"></i></a>

                        @endrole

                    </div>
                </div>
            </div>
        </div>


    @endguest
</div>
<!-- end login box -->
